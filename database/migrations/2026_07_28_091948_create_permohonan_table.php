<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi', 30)->unique();

            // Data pemohon (sesuai field formulir publik)
            $table->string('nama', 150);
            $table->string('pekerjaan', 100);
            $table->text('alamat');
            $table->string('no_hp', 30);
            $table->string('email', 150);

            // Isi permohonan
            $table->text('rincian');
            $table->text('tujuan');
            $table->string('respon', 20);                         // langsung | email | pos | kurir
            $table->string('dokumen', 500)->nullable();           // path lampiran (opsional)

            // Penanganan oleh petugas
            $table->string('status', 20)->default('diterima')->index();   // diterima | diproses | selesai | ditolak
            $table->text('tanggapan')->nullable();
            $table->timestamp('ditanggapi_at')->nullable();
            $table->foreignId('ditanggapi_oleh')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};