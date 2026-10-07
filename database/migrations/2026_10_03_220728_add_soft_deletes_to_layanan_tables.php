<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = ['permohonan', 'pengaduan', 'keberatan', 'informasi'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->softDeletes(); // menambahkan kolom deleted_at
            });
        }
    }

    public function down(): void
    {
        $tables = ['permohonan', 'pengaduan', 'keberatan', 'informasi'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropSoftDeletes();
            });
        }
    }
};