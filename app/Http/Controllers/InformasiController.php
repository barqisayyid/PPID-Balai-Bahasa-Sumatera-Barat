<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiRequest;
use App\Models\Informasi;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index(string $kategori)
    {
        $daftar = Informasi::kategori($kategori)
            ->orderByDesc('tahun')
            ->orderBy('id')
            ->paginate(15);

        return view('admin.informasi.index', $this->dataHalaman($kategori) + ['daftar' => $daftar]);
    }

    public function create(string $kategori)
    {
        $informasi = new Informasi(['tahun' => date('Y'), 'tampil' => true]);

        return view('admin.informasi.form', $this->dataHalaman($kategori) + [
            'informasi' => $informasi,
            'saran'     => $this->saran($kategori),
        ]);
    }

            public function store(InformasiRequest $request, string $kategori)
    {
        $data = $request->safe()->except('dokumen') + [
            'kategori' => $kategori,
            'dokumen'  => $this->simpanDokumen($request, $kategori),
        ];

        $informasi = Informasi::create($data);

        ActivityLog::catat(
            aksi       : 'create',
            model      : $informasi,
            keterangan : "Dokumen informasi baru: {$informasi->nama}",
        );

        return redirect()->route('informasi.index', $kategori)
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit(string $kategori, Informasi $informasi)
    {
        $this->pastikanMilik($kategori, $informasi);

        return view('admin.informasi.form', $this->dataHalaman($kategori) + [
            'informasi' => $informasi,
            'saran'     => $this->saran($kategori),
        ]);
    }

            public function update(InformasiRequest $request, string $kategori, Informasi $informasi)
    {
        $this->pastikanMilik($kategori, $informasi);

        $data = $this->dataTersaring($request, $kategori);
        $data['dokumen'] = $this->simpanDokumen($request, $kategori, $informasi->dokumen);

        $informasi->update($data);

        ActivityLog::catat(
            aksi       : 'update',
            model      : $informasi,
            keterangan : "Dokumen informasi diperbarui: {$informasi->nama}",
        );

        return redirect()->route('informasi.index', $kategori)
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

        public function destroy(string $kategori, Informasi $informasi)
    {
        $this->pastikanMilik($kategori, $informasi);

        ActivityLog::catat(
            aksi       : 'delete',
            model      : $informasi,
            keterangan : "Dokumen informasi dihapus: {$informasi->nama}",
        );

        $informasi->delete();

        return redirect()->route('informasi.index', $kategori)
            ->with('success', 'Dokumen berhasil dihapus.');
    }

    /** Tampilkan / sembunyikan dokumen dari situs publik. */
            public function toggle(string $kategori, Informasi $informasi)
    {
        $this->pastikanMilik($kategori, $informasi);

        $informasi->update(['tampil' => ! $informasi->tampil]);

        ActivityLog::catat(
            aksi       : 'toggle_tampil',
            model      : $informasi,
            keterangan : ($informasi->tampil ? "Dokumen ditampilkan: " : "Dokumen disembunyikan: ") . $informasi->nama,
        );

        return redirect()->route('informasi.index', $kategori)->with(
            'success',
            $informasi->tampil ? 'Dokumen kini ditampilkan di situs publik.' : 'Dokumen disembunyikan dari situs publik.'
        );
    }

    // ------------------------------------------------------------------

    /** Dokumen harus milik kategori yang ada di URL (cegah akses silang lewat ID). */
    private function pastikanMilik(string $kategori, Informasi $informasi): void
    {
        abort_unless($informasi->kategori === $kategori, 404);
    }

    private function dataHalaman(string $kategori): array
    {
        return [
            'kategori'   => $kategori,
            'label'      => Informasi::KATEGORI[$kategori],
            'fields'     => Informasi::fieldAktif($kategori),
            'labelJenis' => Informasi::labelJenis($kategori),
        ];
    }

    /** Hanya kolom yang dipakai kategori ini yang diterima dari form. */
        private function dataTersaring(InformasiRequest $request, string $kategori): array
    {
        $kolom = array_merge(['nama', 'tahun'], Informasi::fieldAktif($kategori));

        return $request->safe()->only($kolom) + ['tampil' => $request->boolean('tampil')];
    }

        /**
     * Simpan berkas PDF baru (jika ada upload); kalau tidak ada upload baru,
     * pertahankan path berkas lama. Berkas lama dihapus dari disk setelah
     * berkas baru berhasil tersimpan.
     */
    private function simpanDokumen(InformasiRequest $request, string $kategori, ?string $lama = null): ?string
    {
        if (! $request->hasFile('dokumen')) {
            return $lama;
        }

        $file = $request->file('dokumen');
        $originalName = $file->getClientOriginalName();
        $path = $file->storeAs("informasi/{$kategori}", $originalName, 'public');

        if ($lama) {
            Storage::disk('public')->delete($lama);
        }

        return $path;
    }

    /** Nilai yang sudah pernah dipakai, untuk saran isian (datalist). */
    private function saran(string $kategori): array
    {
        $ambil = fn (string $kolom) => Informasi::kategori($kategori)
            ->whereNotNull($kolom)->distinct()->orderBy($kolom)->pluck($kolom)->all();

        return [
            'jenis_informasi' => $ambil('jenis_informasi'),
            'pj'              => $ambil('pj'),
        ];
    }
}

