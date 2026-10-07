<?php

namespace App\Http\Controllers;

use App\Mail\FormulirMasuk;
use App\Models\Keberatan;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

/**
 * Menerima tiga formulir layanan di situs publik.
 * Dipanggil lewat fetch() (JSON); tetap aman bila dipanggil sebagai form biasa.
 */
class FormulirController extends Controller
{
    private const LAMPIRAN = ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'];

    public function permohonan(Request $request)
    {
        $data = $request->validate([
            'nama'        => ['required', 'string', 'max:150'],
            'pekerjaan'   => ['required', 'string', 'max:100'],
            'alamat'      => ['required', 'string', 'max:1000'],
            'no_hp'       => ['required', 'string', 'regex:/^[0-9+()\-\s]{6,30}$/'],
            'email'       => ['required', 'email:rfc', 'max:150'],
            'rincian'     => ['required', 'string', 'max:3000'],
            'tujuan'      => ['required', 'string', 'max:3000'],
            'respon'      => ['required', Rule::in(array_keys(Permohonan::RESPON))],
            'dokumen'     => self::LAMPIRAN,
            'persetujuan' => ['accepted'],
        ], $this->pesan(), [
            'nama'      => 'Nama lengkap',
            'pekerjaan' => 'Pekerjaan',
            'alamat'    => 'Alamat',
            'no_hp'     => 'Nomor telepon',
            'email'     => 'Email',
            'rincian'   => 'Rincian informasi yang dibutuhkan',
            'tujuan'    => 'Tujuan penggunaan informasi',
            'respon'    => 'Cara memperoleh informasi',
            'dokumen'   => 'Lampiran',
        ]);

        $item = Permohonan::create(
            Arr::except($data, ['persetujuan', 'dokumen'])
            + ['dokumen' => $request->file('dokumen')?->store('layanan/permohonan')]
        );

        // Pengiriman Notifikasi Email
        try {
            Mail::to(env('PPID_ADMIN_EMAIL', config('mail.from.address')))
                ->send(new FormulirMasuk('permohonan', $item));
        } catch (\Exception $e) {
            Log::error('Gagal kirim notifikasi permohonan: ' . $e->getMessage());
        }

        return $this->berhasil($request, $item,
            'Terima kasih! Permohonan informasi Anda telah berhasil dikirim. Tim PPID akan memproses permohonan Anda dalam waktu maksimal 5 hari kerja. Anda akan dihubungi melalui kontak yang telah diberikan.');
    }

    public function pengaduan(Request $request)
    {
        $data = $request->validate([
            'nama'                  => ['required', 'string', 'max:150'],
            'pekerjaan'             => ['required', 'string', 'max:100'],
            'alamat'                => ['required', 'string', 'max:1000'],
            'no_hp'                 => ['required', 'string', 'regex:/^[0-9+()\-\s]{6,30}$/'],
            'email'                 => ['required', 'email:rfc', 'max:150'],
            'tgl_kejadian'          => ['required', 'date', 'before_or_equal:today'],
            'jenis_kejadian'        => ['required', Rule::in(array_keys(Pengaduan::JENIS))],
            'subjek_pengaduan'      => ['required', 'string', 'max:255'],
            'uraian_pengaduan'      => ['required', 'string', 'max:3000'],
            'harapan'               => ['required', 'string', 'max:3000'],
            'respon'                => ['required', Rule::in(array_keys(Pengaduan::RESPON))],
            'persetujuan-pengaduan' => ['accepted'],
        ], $this->pesan(), [
            'nama'             => 'Nama lengkap',
            'pekerjaan'        => 'Pekerjaan',
            'alamat'           => 'Alamat',
            'no_hp'            => 'Nomor telepon',
            'email'            => 'Email',
            'tgl_kejadian'     => 'Tanggal kejadian',
            'jenis_kejadian'   => 'Jenis pengaduan',
            'subjek_pengaduan' => 'Subjek pengaduan',
            'uraian_pengaduan' => 'Uraian pengaduan',
            'harapan'          => 'Harapan penyelesaian',
            'respon'           => 'Cara menerima tanggapan',
        ]);

        $item = Pengaduan::create(Arr::except($data, ['persetujuan-pengaduan']));

        // Pengiriman Notifikasi Email
        try {
            Mail::to(env('PPID_ADMIN_EMAIL', config('mail.from.address')))
                ->send(new FormulirMasuk('pengaduan', $item));
        } catch (\Exception $e) {
            Log::error('Gagal kirim notifikasi pengaduan: ' . $e->getMessage());
        }

        return $this->berhasil($request, $item,
            'Terima kasih! Pengaduan Anda telah berhasil dikirim. Tim kami akan menindaklanjuti pengaduan Anda dalam waktu maksimal 7 hari kerja. Anda akan dihubungi melalui kontak yang telah diberikan untuk perkembangan penanganan pengaduan.');
    }

    public function keberatan(Request $request)
    {
        // Nama field formulir keberatan berawalan (keberatan-*), dipetakan ke kolom database di bawah.
        $data = $request->validate([
            'keberatan-nama'            => ['required', 'string', 'max:150'],
            'keberatan-pekerjaan'       => ['required', 'string', 'max:100'],
            'keberatan-alamat'          => ['required', 'string', 'max:1000'],
            'keberatan-telepon'         => ['required', 'string', 'regex:/^[0-9+()\-\s]{6,30}$/'],
            'keberatan-email'           => ['required', 'email:rfc', 'max:150'],
            'alasan-keberatan'          => ['required', Rule::in(array_keys(Keberatan::ALASAN))],
            'rincian-keberatan'         => ['required', 'string', 'max:3000'],
            'tujuan-keberatan'          => ['required', 'string', 'max:3000'],
            'tanggal-permohonan'        => ['required', 'date', 'before_or_equal:today'],
            'cara-pengiriman-keberatan' => ['required', Rule::in(array_keys(Keberatan::RESPON))],
            'surat-keberatan'           => self::LAMPIRAN,
            'persetujuan-keberatan'     => ['accepted'],
        ], $this->pesan(), [
            'keberatan-nama'            => 'Nama lengkap',
            'keberatan-pekerjaan'       => 'Pekerjaan',
            'keberatan-alamat'          => 'Alamat',
            'keberatan-telepon'         => 'Nomor telepon',
            'keberatan-email'           => 'Email',
            'alasan-keberatan'          => 'Alasan pengajuan keberatan',
            'rincian-keberatan'         => 'Rincian keberatan',
            'tujuan-keberatan'          => 'Tujuan pengajuan keberatan',
            'tanggal-permohonan'        => 'Tanggal permohonan informasi',
            'cara-pengiriman-keberatan' => 'Cara pengiriman tanggapan',
            'surat-keberatan'           => 'Lampiran',
        ]);

        $item = Keberatan::create([
            'nama'               => $data['keberatan-nama'],
            'pekerjaan'          => $data['keberatan-pekerjaan'],
            'alamat'             => $data['keberatan-alamat'],
            'no_hp'              => $data['keberatan-telepon'],
            'email'              => $data['keberatan-email'],
            'alasan'             => $data['alasan-keberatan'],
            'rincian'            => $data['rincian-keberatan'],
            'tujuan'             => $data['tujuan-keberatan'],
            'tanggal_permohonan' => $data['tanggal-permohonan'],
            'respon'             => $data['cara-pengiriman-keberatan'],
            'dokumen'            => $request->file('surat-keberatan')?->store('layanan/keberatan'),
        ]);

        // Pengiriman Notifikasi Email
        try {
            Mail::to(env('PPID_ADMIN_EMAIL', config('mail.from.address')))
                ->send(new FormulirMasuk('keberatan', $item));
        } catch (\Exception $e) {
            Log::error('Gagal kirim notifikasi keberatan: ' . $e->getMessage());
        }

        return $this->berhasil($request, $item,
            'Terima kasih! Keberatan informasi Anda telah berhasil dikirim. Tim PPID akan memproses keberatan Anda dalam waktu maksimal 30 hari kerja sesuai dengan UU No. 14 Tahun 2008. Anda akan dihubungi melalui kontak yang telah diberikan.');
    }

    // ------------------------------------------------------------------

    private function berhasil(Request $request, $item, string $pesan)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $pesan, 'nomor' => $item->no_registrasi], 201);
        }

        return redirect()->route('main')->with('success', $pesan . ' Nomor registrasi: ' . $item->no_registrasi);
    }

    private function pesan(): array
    {
        return [
            'required'            => ':attribute wajib diisi.',
            'string'              => ':attribute tidak valid.',
            'email'               => ':attribute harus berupa alamat email yang valid.',
            'max'                 => ':attribute maksimal :max karakter.',
            'dokumen.max'         => ':attribute maksimal 5 MB.',
            'surat-keberatan.max' => ':attribute maksimal 5 MB.',
            'file'                => ':attribute harus berupa berkas.',
            'uploaded'            => ':attribute gagal diunggah. Pastikan ukurannya tidak lebih dari 5 MB.',
            'mimes'               => ':attribute harus berformat PDF, DOC, DOCX, JPG, atau PNG.',
            'in'                  => 'Pilihan :attribute tidak valid.',
            'date'                => ':attribute bukan tanggal yang valid.',
            'before_or_equal'     => ':attribute tidak boleh melewati hari ini.',
            'regex'               => 'Format :attribute tidak valid (gunakan angka, spasi, +, -, atau tanda kurung).',
            'accepted'            => 'Anda harus menyetujui pernyataan sebelum mengirim.',
        ];
    }
}