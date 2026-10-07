<?php

namespace Tests\Feature;

use App\Models\Keberatan;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LayananAdminTest extends TestCase
{
    use RefreshDatabase;

    public static function jenis(): array
    {
        return [['permohonan'], ['pengaduan'], ['keberatan']];
    }

    private function buat(string $jenis, array $u = []): Permohonan|Pengaduan|Keberatan
    {
        $umum = ['nama' => 'Pemohon Uji', 'pekerjaan' => 'PNS', 'alamat' => 'Padang', 'no_hp' => '0812', 'email' => 'p@example.com', 'respon' => 'email'];

        return match ($jenis) {
            'permohonan' => Permohonan::create($u + $umum + ['rincian' => 'Data kebahasaan', 'tujuan' => 'Penelitian']),
            'pengaduan'  => Pengaduan::create($u + $umum + ['tgl_kejadian' => '2026-09-01', 'jenis_kejadian' => 'pelayanan',
                'subjek_pengaduan' => 'Antrean lama', 'uraian_pengaduan' => 'Dua jam', 'harapan' => 'Dipercepat']),
            'keberatan'  => Keberatan::create($u + $umum + ['alasan' => 'c', 'rincian' => 'Tidak ditanggapi', 'tujuan' => 'Informasi', 'tanggal_permohonan' => '2026-08-15']),
        };
    }

    #[DataProvider('jenis')]
    public function test_daftar_menampilkan_data_dan_menyaring_status(string $jenis): void
    {
        $baru = $this->buat($jenis);
        $selesai = $this->buat($jenis, ['status' => 'selesai']);
        $this->actingAs($this->operator());

        $this->get(route("{$jenis}.index"))->assertOk()->assertSee($baru->no_registrasi)->assertSee($selesai->no_registrasi);

        $this->get(route("{$jenis}.index", ['status' => 'selesai']))->assertSee($selesai->no_registrasi)->assertDontSee($baru->no_registrasi);

        $this->get(route("{$jenis}.index", ['status' => 'ngawur']))->assertSee($baru->no_registrasi)->assertSee($selesai->no_registrasi);
    }

    #[DataProvider('jenis')]
    public function test_detail_tampil_dan_id_salah_404(string $jenis): void
    {
        $item = $this->buat($jenis, ['nama' => 'Nama Pemohon Khusus']);
        $this->actingAs($this->operator());

        $this->get(route("{$jenis}.show", $item->id))->assertOk()->assertSee('Nama Pemohon Khusus')->assertSee($item->no_registrasi);
        $this->get(route("{$jenis}.show", 99999))->assertNotFound();
        $this->get("/{$jenis}/abc")->assertNotFound();
    }

    public function test_isi_dari_pengunjung_di_escape_di_detail(): void
    {
        $item = $this->buat('pengaduan', ['nama' => '<b>Nakal</b>', 'subjek_pengaduan' => '<img src=x onerror=alert(1)>']);

        $this->actingAs($this->operator())->get(route('pengaduan.show', $item->id))
            ->assertDontSee('<img src=x onerror=alert(1)>', false)->assertDontSee('<b>Nakal</b>', false);
    }

    #[DataProvider('jenis')]
    public function test_ubah_status_tanpa_tanggapan(string $jenis): void
    {
        $item = $this->buat($jenis);

        $this->actingAs($this->operator())->put(route("{$jenis}.update", $item->id), ['status' => 'diproses', 'tanggapan' => ''])
            ->assertRedirect(route("{$jenis}.show", $item->id));

        $item->refresh();
        $this->assertSame('diproses', $item->status);
        $this->assertNull($item->ditanggapi_at);
    }

    public function test_status_ditolak_wajib_disertai_alasan(): void
    {
        $item = $this->buat('permohonan');
        $this->actingAs($this->operator());

        $this->put(route('permohonan.update', $item->id), ['status' => 'ditolak', 'tanggapan' => ''])->assertSessionHasErrors('tanggapan');
        $this->assertSame('diterima', $item->fresh()->status);

        $this->put(route('permohonan.update', $item->id), ['status' => 'ditolak', 'tanggapan' => 'Dikecualikan.'])->assertSessionHasNoErrors();
        $this->assertSame('ditolak', $item->fresh()->status);
    }

    public function test_status_tidak_dikenal_dan_tanggapan_terlalu_panjang_ditolak(): void
    {
        $item = $this->buat('permohonan');
        $this->actingAs($this->operator());

        $this->put(route('permohonan.update', $item->id), ['status' => 'kacau'])->assertSessionHasErrors('status');
        $this->put(route('permohonan.update', $item->id), ['status' => 'selesai', 'tanggapan' => str_repeat('x', 5001)])->assertSessionHasErrors('tanggapan');
    }

    public function test_tanggapan_mencatat_petugas_dan_waktu_hanya_saat_isinya_berubah(): void
    {
        $item = $this->buat('permohonan');
        $petugas = $this->operator();
        $this->actingAs($petugas);

        Carbon::setTestNow('2026-10-02 10:00:00');
        $this->put(route('permohonan.update', $item->id), ['status' => 'diproses', 'tanggapan' => 'Sedang dicari.']);
        $item->refresh();
        $this->assertSame($petugas->id, $item->ditanggapi_oleh);
        $this->assertSame('2026-10-02 10:00:00', $item->ditanggapi_at->format('Y-m-d H:i:s'));

        Carbon::setTestNow('2026-10-03 09:00:00');
        $this->put(route('permohonan.update', $item->id), ['status' => 'selesai', 'tanggapan' => 'Sedang dicari.']); // tanggapan sama
        $this->assertSame('2026-10-02 10:00:00', $item->fresh()->ditanggapi_at->format('Y-m-d H:i:s'));

        $this->put(route('permohonan.update', $item->id), ['status' => 'selesai', 'tanggapan' => 'Sudah dikirim ke email.']); // berubah
        $this->assertSame('2026-10-03 09:00:00', $item->fresh()->ditanggapi_at->format('Y-m-d H:i:s'));

        Carbon::setTestNow();
    }

    public function test_menghapus_petugas_tidak_menghapus_riwayat_tanggapan(): void
    {
        $petugas = $this->operator();
        $item = $this->buat('permohonan', ['tanggapan' => 'Selesai', 'ditanggapi_oleh' => $petugas->id, 'ditanggapi_at' => now()]);

        $petugas->delete();

        $item->refresh();
        $this->assertNull($item->ditanggapi_oleh);
        $this->assertSame('Selesai', $item->tanggapan);
    }

    // ---------------- Lampiran ----------------

    public function test_unduh_lampiran_dengan_nama_dari_nomor_registrasi(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('layanan/permohonan/abc.pdf', 'ISI-PDF');
        $item = $this->buat('permohonan', ['dokumen' => 'layanan/permohonan/abc.pdf']);

        $this->actingAs($this->operator())->get(route('permohonan.lampiran', $item->id))
            ->assertOk()->assertDownload("Lampiran-{$item->no_registrasi}.pdf");

        $this->get(route('permohonan.show', $item->id))->assertSee('Unduh lampiran');
    }

    public function test_lampiran_tidak_ada_atau_nilai_berbahaya_menghasilkan_404(): void
    {
        Storage::fake('local');
        $this->actingAs($this->operator());

        $tanpa = $this->buat('permohonan');
        $this->get(route('permohonan.lampiran', $tanpa->id))->assertNotFound();
        $this->get(route('permohonan.show', $tanpa->id))->assertSee('Tidak ada lampiran');

        $berbahaya = $this->buat('permohonan', ['dokumen' => '../../.env']);
        $this->get(route('permohonan.lampiran', $berbahaya->id))->assertNotFound();

        $hilang = $this->buat('permohonan', ['dokumen' => 'layanan/permohonan/tidak-ada.pdf']);
        $this->get(route('permohonan.lampiran', $hilang->id))->assertNotFound();

        $pengaduan = $this->buat('pengaduan');
        $this->get(route('pengaduan.lampiran', $pengaduan->id))->assertNotFound();
    }

    public function test_data_lama_dengan_nama_berkas_saja_tetap_bisa_diunduh(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('dokumen/lama.pdf', 'LAMA');
        $item = $this->buat('permohonan', ['dokumen' => 'lama.pdf']);

        $this->actingAs($this->operator())->get(route('permohonan.lampiran', $item->id))->assertOk();
    }

    public function test_tamu_tidak_bisa_mengunduh_lampiran(): void
    {
        $item = $this->buat('permohonan', ['dokumen' => 'layanan/permohonan/abc.pdf']);

        $this->get(route('permohonan.lampiran', $item->id))->assertRedirect(route('login'));
    }

    // ---------------- Dashboard ----------------

    public function test_dashboard_menampilkan_jumlah_yang_menunggu(): void
    {
        $this->buat('permohonan');
        $this->buat('permohonan');
        $this->buat('permohonan', ['status' => 'diproses']);
        $this->buat('pengaduan', ['status' => 'selesai']);

        $this->actingAs($this->operator())->get(route('dashboard'))
            ->assertOk()->assertSee('2 menunggu')->assertSee('Tertangani');
    }
}