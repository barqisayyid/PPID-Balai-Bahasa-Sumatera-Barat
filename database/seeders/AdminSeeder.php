<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email    = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (blank($email) || blank($password)) {
            $this->command->error('ADMIN_EMAIL dan ADMIN_PASSWORD wajib diisi di file .env sebelum menjalankan seeder.');
            return;
        }

        // Hapus akun bawaan lama dari template (jika masih ada)
        User::whereIn('email', ['admin@example.com', 'operator@example.com'])->delete();

        User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => env('ADMIN_NAME', 'Administrator PPID'),
                'password' => $password, // di-hash otomatis oleh cast "hashed" pada model User
                'role'     => 'admin',
            ]
        );

        $this->command->info("Akun admin siap: {$email}");
    }
}