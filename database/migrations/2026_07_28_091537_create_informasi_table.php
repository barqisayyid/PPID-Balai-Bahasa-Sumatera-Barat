<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 20);                       // berkala | kebijakan | keuangan | program | statistik
            $table->string('nama', 500);
            $table->string('jenis_informasi', 100)->nullable();   // mis. Laporan, Peraturan Menteri
            $table->string('tahun', 20);
            $table->string('pj', 150)->nullable();                // penanggung jawab
            $table->string('dokumen', 1000)->nullable();          // tautan dokumen (Google Drive / situs resmi)
            $table->boolean('tampil')->default(true);             // false = disembunyikan dari situs publik
            $table->timestamps();

            $table->index(['kategori', 'tampil', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};