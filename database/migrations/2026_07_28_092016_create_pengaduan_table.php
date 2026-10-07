<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi', 30)->unique();

            // Data pengadu (sesuai field formulir publik)
            $table->string('nama', 150);
            $table->string('pekerjaan', 100);
            $table->text('alamat');
            $table->string('no_hp', 30);
            $table->string('email', 150);

            // Isi pengaduan
            $table->date('tgl_kejadian');
            $table->string('jenis_kejadian', 20);                 // pelayanan | fasilitas | pegawai | informasi | lainnya
            $table->string('subjek_pengaduan', 255);
            $table->text('uraian_pengaduan');
            $table->text('harapan');
            $table->string('respon', 20);                         // email | telepon | surat | langsung

            // Penanganan oleh petugas
            $table->string('status', 20)->default('diterima')->index();
            $table->text('tanggapan')->nullable();
            $table->timestamp('ditanggapi_at')->nullable();
            $table->foreignId('ditanggapi_oleh')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};