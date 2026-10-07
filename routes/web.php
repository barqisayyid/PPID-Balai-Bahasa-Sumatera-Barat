<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Informasi;

// Public Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\FormulirController;

// Auth / Admin Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthMainController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;

// Helper function to fetch dokumen
function getDokumen() {
    return Informasi::tampil()
        ->orderByDesc('tahun')
        ->orderBy('id')
        ->get()
        ->groupBy('kategori');
}

Route::get('/', function () { return view('pages.beranda'); })->name('main');
Route::get('/preview-dokumen', [\App\Http\Controllers\MainController::class, 'previewDokumen'])->name('preview.dokumen');
Route::get('/profil-lembaga', function () { return view('pages.profil-lembaga'); });
Route::get('/profil-pegawai', function () { 
    $path = storage_path('app/pegawai.json');
    $pegawai = json_decode(file_get_contents($path), true);
    return view('pages.profil-pegawai', compact('pegawai')); 
});
Route::get('/tugas-fungsi', function () { return view('pages.tugas-fungsi'); });
Route::get('/visi-misi', function () { return view('pages.visi-misi'); });
Route::get('/informasi-publik', function () { return view('pages.informasi-publik'); });
Route::get('/struktur-organisasi', function () { return view('pages.struktur-organisasi'); });
Route::get('/struktur-ppid', function () { return view('pages.struktur-ppid'); });
Route::get('/layanan-ahli-bahasa', function () { return view('pages.layanan-ahli-bahasa'); });

// Pages that need $dokumen
Route::get('/regulasi', function () { return view('pages.regulasi', ['dokumen' => getDokumen()]); });
Route::get('/keuangan', function () { return view('pages.keuangan', ['dokumen' => getDokumen()]); });
Route::get('/capaian', function () { return view('pages.capaian', ['dokumen' => getDokumen()]); });
Route::get('/berkala', function () { return view('pages.berkala', ['dokumen' => getDokumen()]); });
Route::get('/program-kegiatan', function () { return view('pages.program-kegiatan', ['dokumen' => getDokumen()]); });

Route::get('/layanan-informasi', function () { return view('pages.layanan-informasi'); });
Route::get('/form-permohonan', function () { return view('pages.form-permohonan'); });
Route::get('/form-pengaduan', function () { return view('pages.form-pengaduan'); });
Route::get('/form-keberatan', function () { return view('pages.form-keberatan'); });
Route::get('/laporan-layanan', function () { return view('pages.laporan-layanan'); });
Route::get('/pengaduan', function () { return view('pages.pengaduan'); });
Route::get('/satu-data', function () { return view('pages.satu-data'); });

// Form submission routes
Route::post('/formulir/permohonan', [FormulirController::class, 'permohonan'])->name('main.storepermohonan');
Route::post('/formulir/pengaduan', [FormulirController::class, 'pengaduan'])->name('main.storepengaduan');
Route::post('/formulir/keberatan', [FormulirController::class, 'keberatan'])->name('main.storekeberatan');

// Private Image routes
Route::get('/images/private/{folder}/{filename}', function ($folder, $filename) {
    // If it's a profile photo, we don't strictly need auth for this public site
    $path = "private/images/" . $folder . "/" . $filename;
    // Fallback if the path structure is different based on what they uploaded
    if (!Storage::exists($path)) {
        // Let's try alternative path just in case
        $path = "private/" . $folder . "/" . $filename;
    }
    
    if (!Storage::exists($path)) abort(404);
    return response()->file(Storage::path($path));
})->name('private.images');


// ==========================================
// ADMIN & AUTHENTICATION ROUTES
// ==========================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AuthMainController::class, 'index'])->name('dashboard');
        
        // Informasi Routes
        Route::prefix('informasi/{kategori}')->name('informasi.')->group(function () {
            Route::get('/', [InformasiController::class, 'index'])->name('index');
            Route::get('/create', [InformasiController::class, 'create'])->name('create');
            Route::post('/', [InformasiController::class, 'store'])->name('store');
            Route::get('/{informasi}/edit', [InformasiController::class, 'edit'])->name('edit');
            Route::put('/{informasi}', [InformasiController::class, 'update'])->name('update');
            Route::delete('/{informasi}', [InformasiController::class, 'destroy'])->name('destroy');
            Route::patch('/{informasi}/toggle', [InformasiController::class, 'toggle'])->name('toggle');
        });
        
        // Layanan Routes (permohonan, pengaduan, keberatan)
        foreach (['permohonan', 'pengaduan', 'keberatan'] as $jenis) {
            Route::prefix('layanan/'.$jenis)->name($jenis . '.')->group(function () use ($jenis) {
                Route::get('/', [LayananController::class, 'index'])->defaults('jenis', $jenis)->name('index');
                Route::get('/{id}', [LayananController::class, 'show'])->defaults('jenis', $jenis)->name('show');
                Route::put('/{id}', [LayananController::class, 'update'])->defaults('jenis', $jenis)->name('update');
                Route::get('/{id}/lampiran', [LayananController::class, 'lampiran'])->defaults('jenis', $jenis)->name('lampiran');
            });
        }

        // User Routes
        Route::resource('pengguna', UserController::class);

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/tema', [ProfileController::class, 'tema'])->name('profile.tema');

        // Activity Logs
        Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('admin.activity-log');
    });
});


