<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PenggunaTest extends TestCase
{
    use RefreshDatabase;

    private function dataBaru(array $u = []): array
    {
        return $u + ['name' => 'Petugas Baru', 'email' => 'baru@example.com', 'role' => 'operator', 'password' => 'rahasia123', 'password_confirmation' => 'rahasia123'];
    }

    public function test_operator_ditolak_di_semua_halaman_pengguna(): void
    {
        $target = $this->operator();
        $this->actingAs($this->operator());

        $this->get(route('pengguna.index'))->assertForbidden();
        $this->get(route('pengguna.create'))->assertForbidden();
        $this->post(route('pengguna.store'), $this->dataBaru())->assertForbidden();
        $this->get(route('pengguna.edit', $target))->assertForbidden();
        $this->put(route('pengguna.update', $target), $this->dataBaru())->assertForbidden();
        $this->delete(route('pengguna.destroy', $target))->assertForbidden();

        $this->assertDatabaseMissing('users', ['email' => 'baru@example.com']);
    }

    public function test_admin_melihat_daftar_pengguna(): void
    {
        $admin = $this->admin(['name' => 'Admin Utama']);
        $this->operator(['name' => 'Operator Satu']);

        $this->actingAs($admin)->get(route('pengguna.index'))->assertOk()->assertSee('Admin Utama')->assertSee('Operator Satu');
    }

    public function test_admin_menambah_akun_dengan_password_ter_hash(): void
    {
        $this->actingAs($this->admin())->post(route('pengguna.store'), $this->dataBaru())->assertRedirect(route('pengguna.index'));

        $user = User::where('email', 'baru@example.com')->firstOrFail();
        $this->assertSame('operator', $user->role);
        $this->assertNotSame('rahasia123', $user->password);
        $this->assertTrue(Hash::check('rahasia123', $user->password));
    }

    public function test_validasi_penambahan_akun(): void
    {
        $this->operator(['email' => 'sudah@example.com']);
        $this->actingAs($this->admin());

        $this->post(route('pengguna.store'), $this->dataBaru(['email' => 'sudah@example.com']))->assertSessionHasErrors('email');
        $this->post(route('pengguna.store'), $this->dataBaru(['password' => 'pendek', 'password_confirmation' => 'pendek']))->assertSessionHasErrors('password');
        $this->post(route('pengguna.store'), $this->dataBaru(['password_confirmation' => 'berbeda123']))->assertSessionHasErrors('password');
        $this->post(route('pengguna.store'), $this->dataBaru(['role' => 'superuser']))->assertSessionHasErrors('role');
        $this->post(route('pengguna.store'), $this->dataBaru(['name' => '']))->assertSessionHasErrors('name');
        $this->post(route('pengguna.store'), $this->dataBaru(['password' => '', 'password_confirmation' => '']))->assertSessionHasErrors('password');

        $this->assertDatabaseMissing('users', ['email' => 'baru@example.com']);
    }

    public function test_ubah_akun_tanpa_password_mempertahankan_password_lama(): void
    {
        $target = $this->operator(['email' => 'target@example.com']);
        $hashLama = $target->password;
        $this->actingAs($this->admin());

        $this->put(route('pengguna.update', $target), ['name' => 'Nama Diubah', 'email' => 'target@example.com', 'role' => 'operator', 'password' => '', 'password_confirmation' => ''])
            ->assertRedirect(route('pengguna.index'));

        $target->refresh();
        $this->assertSame('Nama Diubah', $target->name);
        $this->assertSame($hashLama, $target->password);
    }

    public function test_ubah_akun_dengan_password_baru(): void
    {
        $target = $this->operator();
        $this->actingAs($this->admin())->put(route('pengguna.update', $target), ['name' => $target->name, 'email' => $target->email, 'role' => 'operator', 'password' => 'passwordbaru1', 'password_confirmation' => 'passwordbaru1']);

        $this->assertTrue(Hash::check('passwordbaru1', $target->fresh()->password));
    }

    public function test_email_milik_akun_lain_ditolak_tetapi_email_sendiri_boleh(): void
    {
        $lain = $this->operator(['email' => 'lain@example.com']);
        $target = $this->operator(['email' => 'target@example.com']);
        $this->actingAs($this->admin());

        $this->put(route('pengguna.update', $target), ['name' => 'X', 'email' => $lain->email, 'role' => 'operator'])->assertSessionHasErrors('email');
        $this->put(route('pengguna.update', $target), ['name' => 'X', 'email' => 'target@example.com', 'role' => 'operator'])->assertSessionHasNoErrors();
    }

    public function test_admin_tidak_bisa_menghapus_akunnya_sendiri(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->delete(route('pengguna.destroy', $admin))->assertSessionHas('error');

        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }

    public function test_admin_bisa_menghapus_operator(): void
    {
        $operator = $this->operator();

        $this->actingAs($this->admin())->delete(route('pengguna.destroy', $operator))->assertRedirect(route('pengguna.index'));

        $this->assertDatabaseMissing('users', ['id' => $operator->id]);
    }

    public function test_admin_terakhir_tidak_bisa_diturunkan_perannya(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)->put(route('pengguna.update', $admin), ['name' => $admin->name, 'email' => $admin->email, 'role' => 'operator'])
            ->assertSessionHasErrors('role');

        $this->assertSame('admin', $admin->fresh()->role);
    }

    public function test_admin_boleh_menurunkan_admin_lain_selama_masih_ada_admin(): void
    {
        $admin = $this->admin();
        $lain = $this->admin();

        $this->actingAs($admin)->put(route('pengguna.update', $lain), ['name' => $lain->name, 'email' => $lain->email, 'role' => 'operator'])
            ->assertSessionHasNoErrors();

        $this->assertSame('operator', $lain->fresh()->role);
    }

    public function test_menu_kelola_pengguna_hanya_terlihat_admin(): void
    {
        $this->actingAs($this->operator())->get(route('dashboard'))->assertDontSee('Kelola Pengguna');
        $this->actingAs($this->admin())->get(route('dashboard'))->assertSee('Kelola Pengguna');
    }
}