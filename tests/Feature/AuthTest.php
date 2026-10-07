<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public static function halamanAdmin(): array
    {
        return [
            ['/dashboard'], ['/informasi/berkala'], ['/informasi/berkala/create'], ['/permohonan'],
            ['/pengaduan'], ['/keberatan'], ['/pengguna'], ['/profile'],
        ];
    }

    #[DataProvider('halamanAdmin')]
    public function test_tamu_diarahkan_ke_halaman_login(string $url): void
    {
        $this->get($url)->assertRedirect(route('login'));
    }

    public function test_halaman_login_terbuka_untuk_tamu(): void
    {
        $this->get('/login')->assertOk()->assertSee('Login');
    }

    public function test_pengguna_yang_sudah_login_dialihkan_dari_halaman_login(): void
    {
        $this->actingAs($this->operator())->get('/login')->assertRedirect(route('dashboard'));
    }

    public function test_admin_dan_operator_bisa_login(): void
    {
        foreach ([$this->admin(), $this->operator()] as $user) {
            $this->post(route('login.attempt'), ['email' => $user->email, 'password' => 'password'])
                ->assertRedirect(route('dashboard'));
            $this->assertAuthenticatedAs($user);
            $this->post(route('logout'));
        }
    }

    public function test_password_salah_ditolak(): void
    {
        $user = $this->admin();

        $this->from('/login')->post(route('login.attempt'), ['email' => $user->email, 'password' => 'salah'])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_email_dan_password_wajib_diisi(): void
    {
        $this->post(route('login.attempt'), [])->assertSessionHasErrors(['email', 'password']);
    }

    public function test_login_dibatasi_setelah_lima_kali_gagal(): void
    {
        $user = $this->admin();

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('login.attempt'), ['email' => $user->email, 'password' => 'salah']);
        }

        // Percobaan ke-6 diblokir meskipun password-nya benar
        $this->post(route('login.attempt'), ['email' => $user->email, 'password' => 'password'])
            ->assertSessionHasErrors('email');

        $this->assertStringContainsString('Terlalu banyak percobaan', session('errors')->first('email'));
        $this->assertGuest();
    }

    public function test_logout_mengakhiri_sesi(): void
    {
        $this->actingAs($this->admin())->post(route('logout'))->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_profil_dapat_diperbarui(): void
    {
        $user = $this->operator();

        $this->actingAs($user)->put(route('profile.update'), ['name' => 'Nama Baru', 'email' => 'baru@example.com'])
            ->assertRedirect(route('profile.edit'));

        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Nama Baru', 'email' => 'baru@example.com']);
    }

    public function test_ganti_password_wajib_password_lama_yang_benar(): void
    {
        $user = $this->operator();
        $data = ['name' => $user->name, 'email' => $user->email, 'password' => 'passwordbaru1', 'password_confirmation' => 'passwordbaru1'];

        $this->actingAs($user)->put(route('profile.update'), $data)->assertSessionHasErrors('current_password');
        $this->put(route('profile.update'), $data + ['current_password' => 'keliru'])->assertSessionHasErrors('current_password');

        $this->put(route('profile.update'), $data + ['current_password' => 'password'])->assertSessionHasNoErrors();
        $this->assertTrue(password_verify('passwordbaru1', $user->fresh()->password));
    }

    public function test_email_profil_tidak_boleh_sama_dengan_akun_lain(): void
    {
        $lain = $this->admin(['email' => 'lain@example.com']);
        $user = $this->operator();

        $this->actingAs($user)->put(route('profile.update'), ['name' => 'X', 'email' => $lain->email])
            ->assertSessionHasErrors('email');
    }

    public function test_tema_tersimpan_dan_nilai_salah_ditolak(): void
    {
        $user = $this->operator();

        $this->actingAs($user)->postJson(route('theme.update'), ['theme' => 'dark'])->assertOk()->assertJson(['success' => true]);
        $this->assertSame('dark', $user->fresh()->theme);

        $this->postJson(route('theme.update'), ['theme' => 'merah'])->assertStatus(422);
        $this->assertSame('dark', $user->fresh()->theme);
    }
}