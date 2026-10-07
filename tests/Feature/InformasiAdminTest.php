<?php

namespace Tests\Feature;

use App\Models\Informasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class InformasiAdminTest extends TestCase
{
    use RefreshDatabase;

    public static function kategori(): array
    {
        return [['berkala'], ['kebijakan'], ['keuangan'], ['program'], ['statistik']];
    }

    private function dok(string $kategori = 'berkala', array $a = []): Informasi
    {
        return Informasi::create($a + ['kategori' => $kategori, 'nama' => 'Dokumen Awal', 'tahun' => '2025', 'tampil' => true]);
    }

    private function rute(string $nama, string $kategori, ?Informasi $item = null): string
    {
        return route($nama, array_filter(['kategori' => $kategori, 'informasi' => $item]));
    }

    #[DataProvider('kategori')]
    public function test_daftar_tiap_kategori_terbuka(string $kategori): void
    {
        $this->dok($kategori, ['nama' => 'Berkas Dalam Daftar']);

        $this->actingAs($this->operator())->get($this->rute('informasi.index', $kategori))
            ->assertOk()->assertSee(Informasi::KATEGORI[$kategori])->assertSee('Berkas Dalam Daftar');
    }

    public function test_kategori_tidak_dikenal_404(): void
    {
        $this->actingAs($this->admin())->get('/informasi/ngawur')->assertNotFound();
    }

    #[DataProvider('kategori')]
    public function test_tambah_dokumen_di_setiap_kategori(string $kategori): void
    {
        $this->actingAs($this->operator())->post($this->rute('informasi.store', $kategori), [
            'nama' => 'Dokumen Uji', 'tahun' => '2025', 'dokumen' => 'https://example.org/x', 'tampil' => '1',
        ])->assertRedirect($this->rute('informasi.index', $kategori));

        $this->assertDatabaseHas('informasi', ['kategori' => $kategori, 'nama' => 'Dokumen Uji', 'tampil' => 1]);
    }

    public function test_validasi_menolak_data_salah(): void
    {
        $this->actingAs($this->operator())
            ->post($this->rute('informasi.store', 'keuangan'), ['nama' => '', 'tahun' => 'abc', 'dokumen' => 'javascript:alert(1)'])
            ->assertSessionHasErrors(['nama', 'tahun', 'dokumen']);

        $this->assertDatabaseCount('informasi', 0);
    }

    public function test_alamat_dokumen_hanya_http_atau_https(): void
    {
        $this->actingAs($this->operator());

        foreach (['ftp://x.org/a', 'javascript:alert(1)', 'data:text/html,x'] as $buruk) {
            $this->post($this->rute('informasi.store', 'berkala'), ['nama' => 'X', 'tahun' => '2025', 'dokumen' => $buruk])
                ->assertSessionHasErrors('dokumen');
        }
        $this->assertDatabaseCount('informasi', 0);
    }

    public function test_tahun_boleh_rentang_dan_tautan_boleh_kosong(): void
    {
        $this->actingAs($this->operator())->post($this->rute('informasi.store', 'program'), ['nama' => 'Rentang', 'tahun' => '2024/2025', 'dokumen' => ''])
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('informasi', ['nama' => 'Rentang', 'tahun' => '2024/2025', 'dokumen' => null]);
    }

    public function test_kolom_yang_bukan_milik_kategori_diabaikan(): void
    {
        $this->actingAs($this->operator())->post($this->rute('informasi.store', 'keuangan'), [
            'nama' => 'Keuangan Uji', 'tahun' => '2025', 'pj' => 'Bagian Umum', 'jenis_informasi' => 'DISUSUPKAN',
        ]);

        $this->assertDatabaseHas('informasi', ['nama' => 'Keuangan Uji', 'pj' => 'Bagian Umum', 'jenis_informasi' => null]);
    }

    public function test_kategori_ditentukan_url_bukan_input_form(): void
    {
        $this->actingAs($this->operator())->post($this->rute('informasi.store', 'keuangan'), [
            'nama' => 'Uji Kategori', 'tahun' => '2025', 'kategori' => 'berkala',
        ]);

        $this->assertDatabaseHas('informasi', ['nama' => 'Uji Kategori', 'kategori' => 'keuangan']);
    }

    public function test_ubah_dokumen(): void
    {
        $item = $this->dok('berkala');

        $this->actingAs($this->operator())->put($this->rute('informasi.update', 'berkala', $item), [
            'nama' => 'Nama Baru', 'tahun' => '2026', 'tampil' => '0',
        ])->assertRedirect($this->rute('informasi.index', 'berkala'));

        $this->assertDatabaseHas('informasi', ['id' => $item->id, 'nama' => 'Nama Baru', 'tahun' => '2026', 'tampil' => 0]);
    }

    public function test_dokumen_milik_kategori_lain_tidak_bisa_diakses_lewat_id(): void
    {
        $item = $this->dok('berkala');
        $this->actingAs($this->admin());

        $this->get($this->rute('informasi.edit', 'keuangan', $item))->assertNotFound();
        $this->put($this->rute('informasi.update', 'keuangan', $item), ['nama' => 'DIRETAS', 'tahun' => '2025'])->assertNotFound();
        $this->patch($this->rute('informasi.toggle', 'keuangan', $item))->assertNotFound();
        $this->delete($this->rute('informasi.destroy', 'keuangan', $item))->assertNotFound();

        $this->assertDatabaseHas('informasi', ['id' => $item->id, 'nama' => 'Dokumen Awal', 'tampil' => 1]);
    }

    public function test_tampilkan_dan_sembunyikan(): void
    {
        $item = $this->dok('berkala');
        $this->actingAs($this->operator());

        $this->patch($this->rute('informasi.toggle', 'berkala', $item));
        $this->assertFalse($item->fresh()->tampil);

        $this->patch($this->rute('informasi.toggle', 'berkala', $item));
        $this->assertTrue($item->fresh()->tampil);
    }

    public function test_hanya_admin_yang_boleh_menghapus(): void
    {
        $item = $this->dok('berkala');

        $this->actingAs($this->operator())->delete($this->rute('informasi.destroy', 'berkala', $item))->assertForbidden();
        $this->assertDatabaseHas('informasi', ['id' => $item->id]);

        $this->actingAs($this->admin())->delete($this->rute('informasi.destroy', 'berkala', $item))
            ->assertRedirect($this->rute('informasi.index', 'berkala'));
        $this->assertDatabaseMissing('informasi', ['id' => $item->id]);
    }

    public function test_tombol_hapus_hanya_terlihat_oleh_admin(): void
    {
        $this->dok('berkala');

        // Atribut asli selalu diikuti &quot; (berbeda dari contoh di komentar JavaScript layout)
        $this->actingAs($this->operator())->get($this->rute('informasi.index', 'berkala'))->assertDontSee('Hapus dokumen &quot;', false);
        $this->actingAs($this->admin())->get($this->rute('informasi.index', 'berkala'))->assertSee('Hapus dokumen &quot;', false);
    }

    public function test_html_pada_nama_di_escape_di_panel_admin(): void
    {
        $this->dok('statistik', ['nama' => '<script>alert(1)</script> "kutip"']);

        $this->actingAs($this->admin())->get($this->rute('informasi.index', 'statistik'))
            ->assertDontSee('<script>alert(1)</script>', false);
    }
}