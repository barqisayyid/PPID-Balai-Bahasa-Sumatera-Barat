<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    /**
     * PENGAMAN: tes memakai RefreshDatabase yang MENGHAPUS seluruh tabel.
     * Dicek di sini, sebelum migrasi dijalankan, agar database MySQL asli tidak pernah tersentuh.
     */
    protected function refreshApplication(): void
    {
        parent::refreshApplication();

        $koneksi = DB::connection();

        if ($koneksi->getDriverName() !== 'sqlite' || $koneksi->getDatabaseName() !== ':memory:') {
            throw new RuntimeException(
                'Tes dihentikan: koneksi database bukan SQLite :memory: (sekarang: '
                . $koneksi->getDriverName() . ' / ' . $koneksi->getDatabaseName() . '). '
                . 'Buka komentar dua baris DB_CONNECTION dan DB_DATABASE di phpunit.xml.'
            );
        }
    }

    protected function admin(array $atribut = []): \App\Models\User
    {
        return \App\Models\User::factory()->create($atribut + ['role' => 'admin']);
    }

    protected function operator(array $atribut = []): \App\Models\User
    {
        return \App\Models\User::factory()->create($atribut + ['role' => 'operator']);
    }
}