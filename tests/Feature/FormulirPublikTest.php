<?php

namespace Tests\Feature;

use App\Models\Keberatan;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class FormulirPublikTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
    }

    private function kirim(string $rute, array $data = [])
    {
        return $this->withHeaders(['Accept' => 'application/json'])->post(route($rute), $data);
    }

    private function permohonan(array $u = []): array
    {
        return $u + ['nama' => 'Sari Amelia', 'pekerjaan' => 'Mahasiswa', 'alamat' => "Jl. Sudirman 1\nPadang", 'no_hp' => '0812-3456-7890',
            'email' => 'sari@example.com', 'rincian' => 'Data kebahasaan 2024', 'tujuan' => 'Penelitian', 'respon' => 'email', 'persetujuan' => 'on'];
    }

    private function pengaduan(array $u = []): array
    {
        return $u + ['nama' => 'Budi', 'pekerjaan' => 'PNS', 'alamat' => 'Padang', 'no_hp' => '0811111111', 'email' => 'b@example.com',
            'tgl_kejadian' => now()->subDay()->format('Y-m-d'), 'jenis_kejadian' => 'pelayanan', 'subjek_pengaduan' => 'Antrean lama',
            'uraian_pengaduan' => 'Menunggu dua jam', 'harapan' => 'Dipercepat', 'respon' => 'email', 'persetujuan-pengaduan' => 'on'];
    }

    private function keberatan(array $u = []): array
    {
        return $u + ['keberatan-nama' => 'Rina', 'keberatan-pekerjaan' => 'Guru', 'keberatan-alamat' => 'Padang', 'keberatan-telepon' => '0822222222',
            'keberatan-email' => 'r@example.com', 'alasan-keberatan' => 'c', 'rincian-keberatan' => 'Tidak ditanggapi', 'tujuan-keberatan' => 'Mendapat informasi',
            'tanggal-permohonan' => now()->subWeek()->format('Y-m-d'), 'cara-pengiriman-keberatan' => 'pos', 'persetujuan-keberatan' => 'on'];
    }

    // ---------------- Permohonan ----------------

    public function test_permohonan_valid_tersimpan_dan_mengembalikan_nomor(): void
    {
        $r = $this->kirim('main.storepermohonan', $this->permohonan())->assertCreated();

        $this->assertMatchesRegularExpression('/^PMH-\d{8}-[A-Z2-9]{6}$/', $r->json('nomor'));
        $this->assertStringContainsString('5 hari kerja', $r->json('message'));
        $this->assertDatabaseHas('permohonan', ['nama' => 'Sari Amelia', 'no_hp' => '0812-3456-7890', 'status' => 'diterima', 'dokumen' => null]);
    }

    public function test_lampiran_permohonan_disimpan_di_folder_privat(): void
    {
        $this->kirim('main.storepermohonan', $this->permohonan(['dokumen' => UploadedFile::fake()->create('surat.pdf', 200, 'application/pdf')]))->assertCreated();

        $path = Permohonan::first()->dokumen;
        $this->assertStringStartsWith('layanan/permohonan/', $path);
        Storage::disk('local')->assertExists($path);
    }

    public function test_kiriman_kosong_ditolak_dengan_pesan_indonesia(): void
    {
        $r = $this->kirim('main.storepermohonan')->assertStatus(422);

        $r->assertJsonValidationErrors(['nama', 'pekerjaan', 'alamat', 'no_hp', 'email', 'rincian', 'tujuan', 'respon', 'persetujuan']);
        $this->assertStringContainsString('wajib diisi', $r->json('errors.nama.0'));
        $this->assertStringNotContainsString('field', $r->json('errors.nama.0'));
        $this->assertDatabaseCount('permohonan', 0);
    }

    public static function aturanPermohonan(): array
    {
        return [
            'email salah'        => ['email', 'bukan-email', 'email yang valid'],
            'telepon huruf'      => ['no_hp', 'abc!!', 'tidak valid'],
            'respon di luar daftar' => ['respon', 'merpati', 'tidak valid'],
            'nama kepanjangan'   => ['nama', str_repeat('x', 151), 'maksimal 150 karakter'],
            'rincian kepanjangan' => ['rincian', str_repeat('x', 3001), 'maksimal 3000 karakter'],
        ];
    }

    #[DataProvider('aturanPermohonan')]
    public function test_aturan_kolom_permohonan(string $kolom, string $nilai, string $pesan): void
    {
        $r = $this->kirim('main.storepermohonan', $this->permohonan([$kolom => $nilai]))->assertStatus(422);

        $this->assertStringContainsString($pesan, $r->json("errors.{$kolom}.0"));
        $this->assertDatabaseCount('permohonan', 0);
    }

    public function test_persetujuan_wajib_dicentang(): void
    {
        $data = $this->permohonan();
        unset($data['persetujuan']);

        $this->kirim('main.storepermohonan', $data)->assertJsonValidationErrors('persetujuan');
    }

    public function test_lampiran_harus_pdf_doc_atau_gambar_dan_maksimal_5mb(): void
    {
        $this->kirim('main.storepermohonan', $this->permohonan(['dokumen' => UploadedFile::fake()->create('virus.exe', 10)]))
            ->assertJsonValidationErrors('dokumen');

        $r = $this->kirim('main.storepermohonan', $this->permohonan(['dokumen' => UploadedFile::fake()->create('besar.pdf', 6000, 'application/pdf')]))
            ->assertStatus(422);
        $this->assertStringContainsString('maksimal 5 MB', $r->json('errors.dokumen.0'));

        $this->assertDatabaseCount('permohonan', 0);
        $this->assertSame([], Storage::disk('local')->allFiles());
    }

    // ---------------- Pengaduan ----------------

    public function test_pengaduan_valid_tersimpan(): void
    {
        $r = $this->kirim('main.storepengaduan', $this->pengaduan())->assertCreated();

        $this->assertStringStartsWith('PGD-', $r->json('nomor'));
        $this->assertStringContainsString('7 hari kerja', $r->json('message'));
        $this->assertDatabaseHas('pengaduan', ['nama' => 'Budi', 'jenis_kejadian' => 'pelayanan', 'status' => 'diterima']);
    }

    public function test_pengaduan_tanggal_masa_depan_dan_jenis_salah_ditolak(): void
    {
        $this->kirim('main.storepengaduan', $this->pengaduan(['tgl_kejadian' => '2999-01-01']))->assertJsonValidationErrors('tgl_kejadian');
        $this->kirim('main.storepengaduan', $this->pengaduan(['jenis_kejadian' => 'ngawur']))->assertJsonValidationErrors('jenis_kejadian');
        $this->assertDatabaseCount('pengaduan', 0);
    }

    // ---------------- Keberatan ----------------

    public function test_keberatan_valid_dipetakan_ke_kolom_database(): void
    {
        $r = $this->kirim('main.storekeberatan', $this->keberatan())->assertCreated();

        $this->assertStringStartsWith('KBR-', $r->json('nomor'));
        $this->assertStringContainsString('30 hari kerja', $r->json('message'));
        $this->assertDatabaseHas('keberatan', ['nama' => 'Rina', 'no_hp' => '0822222222', 'email' => 'r@example.com', 'alasan' => 'c', 'respon' => 'pos']);
    }

    public function test_keberatan_dengan_lampiran_dan_aturan(): void
    {
        $this->kirim('main.storekeberatan', $this->keberatan(['surat-keberatan' => UploadedFile::fake()->create('k.pdf', 100, 'application/pdf')]))->assertCreated();
        $this->assertStringStartsWith('layanan/keberatan/', Keberatan::first()->dokumen);

        $this->kirim('main.storekeberatan', $this->keberatan(['alasan-keberatan' => 'z']))->assertJsonValidationErrors('alasan-keberatan');
        $r = $this->kirim('main.storekeberatan', $this->keberatan(['tanggal-permohonan' => 'bukan-tanggal']))->assertStatus(422);
        $this->assertStringContainsString('Tanggal permohonan informasi', $r->json('errors')['tanggal-permohonan'][0]);
        $this->assertDatabaseCount('keberatan', 1);
    }

    // ---------------- Umum ----------------

    public function test_nomor_registrasi_selalu_unik(): void
    {
        $nomor = collect(range(1, 200))->map(fn () => Pengaduan::buatNomorRegistrasi());

        $this->assertCount(200, $nomor->unique());
    }

    public function test_pengiriman_dibatasi_sepuluh_kali_per_sepuluh_menit(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $this->kirim('main.storekeberatan')->assertStatus(422);
        }

        $this->kirim('main.storekeberatan')->assertStatus(429)->assertHeader('Retry-After');
        $this->kirim('main.storepermohonan', $this->permohonan())->assertStatus(429); // jatah dipakai bersama
    }

    public function test_endpoint_hanya_menerima_post(): void
    {
        $this->get('/storepengaduan')->assertStatus(405);
    }

    public function test_tanpa_javascript_pengunjung_diarahkan_kembali(): void
    {
        $this->post(route('main.storepengaduan'), $this->pengaduan())->assertRedirect(route('main'))->assertSessionHas('success');
        $this->assertDatabaseCount('pengaduan', 1);
    }

    public function test_html_dari_pengunjung_disimpan_apa_adanya_dan_di_escape_saat_ditampilkan(): void
    {
        $this->kirim('main.storepengaduan', $this->pengaduan(['subjek_pengaduan' => '<img src=x onerror=alert(1)>']))->assertCreated();

        $this->actingAs($this->operator())->get(route('pengaduan.index'))->assertDontSee('<img src=x onerror=alert(1)>', false);
        $this->get(route('pengaduan.show', Pengaduan::first()->id))->assertDontSee('<img src=x onerror=alert(1)>', false);
    }
}