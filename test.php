<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$dokumen = App\Models\Informasi::tampil()->orderByDesc('tahun')->orderBy('id')->get()->groupBy('kategori');
echo view('pages.berkala', ['dokumen' => $dokumen])->render();
