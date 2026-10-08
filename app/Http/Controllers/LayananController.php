<?php

namespace App\Http\Controllers;

use App\Models\Keberatan;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\ActivityLog;

/**
 * Kotak masuk admin untuk permohonan informasi, pengaduan, dan keberatan.
 * Satu controller untuk ketiganya; jenisnya datang dari route (lihat routes/web.php).
 */
class LayananController extends Controller
{
    private const MODEL = [
        'permohonan' => Permohonan::class,
        'pengaduan'  => Pengaduan::class,
        'keberatan'  => Keberatan::class,
    ];

    private const JUDUL = [
        'permohonan' => 'Permohonan Informasi',
        'pengaduan'  => 'Pengaduan',
        'keberatan'  => 'Keberatan',
    ];

    public function index(Request $request)
    {
        $jenis  = $this->jenis($request);
        $model  = $this->model($jenis);
        $status = $request->query('status');
        $status = array_key_exists($status, $model::STATUS) ? $status : null;

        // Mengubah ->get() menjadi ->paginate(15) serta mempertahankan query parameter (seperti status)
        $daftar = $model::query()->status($status)->latest()->paginate(15)->withQueryString();
        $jumlah = $model::query()->selectRaw('status, count(*) as n')->groupBy('status')->pluck('n', 'status');

        return view('admin.layanan.index', [
            'jenis'       => $jenis,
            'judul'       => self::JUDUL[$jenis],
            'statusAktif' => $status,
            'statusList'  => $model::STATUS,
            'jumlah'      => $jumlah,
            'total'       => $jumlah->sum(),
            'daftar'      => $daftar,
            'ringkas'     => fn ($item) => $this->ringkas($jenis, $item),
        ]);
    }

    public function show(Request $request, string $id)
    {
        $jenis = $this->jenis($request);
        $model = $this->model($jenis);
        $item  = $model::with('penanggap')->findOrFail($id);

        return view('admin.layanan.show', [
            'jenis'      => $jenis,
            'judul'      => self::JUDUL[$jenis],
            'item'       => $item,
            'baris'      => $this->baris($jenis, $item),
            'statusList' => $model::STATUS,
            'adaFile'    => $this->berkas($item) !== null,
        ]);
    }

        public function update(Request $request, string $id)
    {
        $jenis = $this->jenis($request);
        $model = $this->model($jenis);
        $item  = $model::findOrFail($id);

        $data = $request->validate([
            'status'    => ['required', Rule::in(array_keys($model::STATUS))],
            'tanggapan' => ['nullable', 'string', 'max:5000', 'required_if:status,ditolak'],
        ], [
            'status.required'       => 'Status harus dipilih.',
            'status.in'             => 'Status tidak valid.',
            'tanggapan.max'         => 'Tanggapan maksimal 5000 karakter.',
            'tanggapan.required_if' => 'Alasan penolakan wajib diisi pada kolom tanggapan.',
        ]);

        $statusLama = $item->status;

        $item->status    = $data['status'];
        $item->tanggapan = $data['tanggapan'] ?? null;

        // Catat siapa dan kapan hanya bila isi tanggapan benar-benar berubah
        if ($item->isDirty('tanggapan') && filled($item->tanggapan)) {
            $item->ditanggapi_at    = now();
            $item->ditanggapi_oleh  = $request->user()->id;
        }

        $item->save();

        if ($item->wasChanged('status') || $item->wasChanged('tanggapan')) {
            try {
                \Illuminate\Support\Facades\Mail::to($item->email)
                    ->send(new \App\Mail\NotifikasiPengunjung($item, $jenis, true));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Gagal kirim notifikasi update status {$jenis}: " . $e->getMessage());
            }
        }

        if ($item->wasChanged('status')) {
            ActivityLog::catat(
                aksi       : 'update_status',
                model      : $item,
                keterangan : "Status {$jenis} #{$item->no_registrasi} diubah dari [{$statusLama}] ke [{$item->status}]",
                perubahan  : ['sebelum' => $statusLama, 'sesudah' => $item->status],
            );
        }

        return redirect()->route($jenis . '.show', $item->id)->with('success', 'Status dan tanggapan berhasil disimpan.');
    }

    /** Unduh lampiran dari penyimpanan privat (hanya untuk petugas yang sudah login). */
    public function lampiran(Request $request, string $id)
    {
        $item = $this->model($this->jenis($request))::findOrFail($id);
        $path = $this->berkas($item);

        abort_if($path === null, 404);

        $ekstensi = pathinfo($path, PATHINFO_EXTENSION);

        return Storage::disk('local')->download($path, 'Lampiran-' . $item->no_registrasi . ($ekstensi ? '.' . $ekstensi : ''));
    }

    // ------------------------------------------------------------------

    /**
     * Jenis (permohonan/pengaduan/keberatan) diambil dari route berdasarkan NAMA parameter.
     * Jangan diambil dari posisi argumen: Laravel memanggil method secara berurutan.
     */
    private function jenis(Request $request): string
    {
        return (string) $request->route('jenis');
    }

    private function model(string $jenis): string
    {
        abort_unless(isset(self::MODEL[$jenis]), 404);

        return self::MODEL[$jenis];
    }

    /** Path lampiran yang benar-benar ada di disk, atau null. */
    private function berkas($item): ?string
    {
        if (blank($item->dokumen)) {
            return null;
        }

        $disk = Storage::disk('local');

        foreach ([$item->dokumen, 'dokumen/' . $item->dokumen] as $kandidat) { // kandidat kedua: data uji lama
            try {
                if ($disk->exists($kandidat)) {
                    return $kandidat;
                }
            } catch (\Throwable $e) {
                // path tidak valid (mis. mengandung ../) dianggap tidak ada
            }
        }

        return null;
    }

    /** Teks ringkas untuk kolom "Perihal" di daftar. */
    private function ringkas(string $jenis, $item): string
    {
        return match ($jenis) {
            'permohonan' => Str::limit($item->rincian, 90),
            'pengaduan'  => $item->subjek_pengaduan,
            'keberatan'  => $item->alasan_label,
        };
    }

    /** Pasangan label => nilai untuk halaman detail. */
    private function baris(string $jenis, $item): array
    {
        $identitas = [
            'Nama'      => $item->nama,
            'Pekerjaan' => $item->pekerjaan,
            'Alamat'    => $item->alamat,
            'No. HP'    => $item->no_hp,
            'Email'     => $item->email,
        ];

        $isi = match ($jenis) {
            'permohonan' => [
                'Rincian informasi'       => $item->rincian,
                'Tujuan penggunaan'       => $item->tujuan,
                'Cara memperoleh'         => Permohonan::RESPON[$item->respon] ?? $item->respon,
            ],
            'pengaduan' => [
                'Tanggal kejadian'        => $item->tgl_kejadian?->format('d/m/Y'),
                'Jenis pengaduan'         => Pengaduan::JENIS[$item->jenis_kejadian] ?? $item->jenis_kejadian,
                'Subjek'                  => $item->subjek_pengaduan,
                'Uraian'                  => $item->uraian_pengaduan,
                'Harapan penyelesaian'    => $item->harapan,
                'Cara menerima tanggapan' => Pengaduan::RESPON[$item->respon] ?? $item->respon,
            ],
            'keberatan' => [
                'Alasan keberatan'        => $item->alasan_label,
                'Rincian keberatan'       => $item->rincian,
                'Tujuan'                  => $item->tujuan,
                'Tanggal permohonan'      => $item->tanggal_permohonan?->format('d/m/Y'),
                'Cara pengiriman'         => Keberatan::RESPON[$item->respon] ?? $item->respon,
            ],
        };

        return ['identitas' => $identitas, 'isi' => $isi];
    }
    // Saat admin update status permohonan:
}