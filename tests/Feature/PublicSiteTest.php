<?php

namespace Tests\Feature;

use App\Models\Informasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    private function dok(array $a = []): Informasi
    {
        return Informasi::create($a + ['kategori' => 'berkala', 'nama' => 'Dokumen', 'tahun' => '2025', 'tampil' => true]);
    }

    public function test_beranda_terbuka(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_hanya_dokumen_yang_ditampilkan_muncul_di_publik(): void
    {
        $this->dok(['nama' => 'Dokumen Terlihat Publik', 'tampil' => true]);
        $this->dok(['nama' => 'Dokumen Disembunyikan Admin', 'tampil' => false]);

        $this->get('/')->assertSee('Dokumen Terlihat Publik')->assertDontSee('Dokumen Disembunyikan Admin');
    }

    public function test_setiap_kategori_muncul_di_tabelnya_sendiri(): void
    {
        foreach (['berkala', 'kebijakan', 'keuangan', 'program', 'statistik'] as $k) {
            $this->dok(['kategori' => $k, 'nama' => "Berkas {$k} uji"]);
        }

        $html = $this->get('/')->getContent();

        foreach (['berkala', 'kebijakan', 'keuangan', 'program', 'statistik'] as $k) {
            preg_match('/<table id="tabel-' . $k . '".*?<\/table>/s', $html, $m);
            $this->assertStringContainsString("Berkas {$k} uji", $m[0] ?? '', "Dokumen {$k} tidak ada di tabel {$k}");
        }
    }

    public function test_dokumen_tanpa_tautan_menampilkan_dalam_proses(): void
    {
        $this->dok(['nama' => 'Renstra Uji', 'dokumen' => null]);

        $this->get('/')->assertSee('(Dalam Proses)');
    }

    public function test_tautan_dokumen_dibuka_di_tab_baru_dengan_rel_aman(): void
    {
        $this->dok(['dokumen' => 'https://example.org/berkas.pdf']);

        $this->get('/')->assertSee('href="https://example.org/berkas.pdf" target="_blank" rel="noopener noreferrer"', false);
    }

    public function test_tahun_terbaru_tampil_lebih_dulu(): void
    {
        $this->dok(['kategori' => 'kebijakan', 'nama' => 'Regulasi Lama Sembilan', 'tahun' => '2009']);
        $this->dok(['kategori' => 'kebijakan', 'nama' => 'Regulasi Baru Dua Lima', 'tahun' => '2025']);

        $this->get('/')->assertSeeInOrder(['Regulasi Baru Dua Lima', 'Regulasi Lama Sembilan']);
    }

    public function test_nama_dokumen_berisi_html_di_escape(): void
    {
        $this->dok(['nama' => '<script>alert(1)</script> Nama Nakal']);

        $this->get('/')->assertDontSee('<script>alert(1)</script>', false)->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false);
    }

    public function test_tidak_ada_jejak_balai_bahasa_lain_di_halaman(): void
    {
        $this->get('/')->assertDontSee('Banten')->assertDontSee('Jakarta');
    }

    public function test_header_keamanan_terpasang(): void
    {
        $this->get('/')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeaderMissing('Strict-Transport-Security');

        $this->get('https://localhost/')->assertHeader('Strict-Transport-Security');
    }

    public function test_halaman_publik_boleh_di_cache_tetapi_panel_admin_tidak(): void
    {
        $this->assertStringNotContainsString('no-store', (string) $this->get('/')->headers->get('Cache-Control'));

        $this->actingAs($this->admin())->get('/dashboard')->assertHeader('Cache-Control');
        $this->assertStringContainsString('no-store', $this->get('/dashboard')->headers->get('Cache-Control'));
    }

    public function test_halaman_error_berbahasa_indonesia(): void
    {
        $this->get('/tidak-ada-halaman-ini')->assertNotFound()->assertSee('Halaman tidak ditemukan');

        $this->actingAs($this->operator())->get('/pengguna')->assertForbidden()->assertSee('Anda tidak memiliki akses');
    }

    public function test_gambar_privat_disajikan_tetapi_tidak_bisa_keluar_folder(): void
    {
        $folder = storage_path('app/private/images/ujites');
        File::ensureDirectoryExists($folder);
        File::put($folder . '/a.png', 'PNG');

        try {
            $this->get('/images/private/ujites/a.png')->assertOk();
            $this->get('/images/private/ujites/tidak-ada.png')->assertNotFound();
            $this->get('/images/private/%2e%2e/.gitignore')->assertNotFound();
            $this->get('/images/private/ujites/..%2f..%2f.gitignore')->assertNotFound();
        } finally {
            File::deleteDirectory($folder);
        }
    }
}