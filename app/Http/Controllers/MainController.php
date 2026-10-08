<?php

namespace App\Http\Controllers;

use App\Models\Informasi;

class MainController extends Controller
{
    public function index()
    {
        // Semua dokumen yang berstatus "tampil", dikelompokkan per kategori
        $dokumen = Informasi::tampil()
            ->orderByDesc('tahun')
            ->orderBy('id')
            ->get()
            ->groupBy('kategori');

        return view('main.app', compact('dokumen'));
    }
    public function previewDokumen(\Illuminate\Http\Request $request)
    {
        $file = $request->query('file');
        
        if (!$file || !\Illuminate\Support\Facades\Storage::disk('public')->exists($file)) {
            abort(404, 'Dokumen tidak ditemukan.');
        }

        $path = \Illuminate\Support\Facades\Storage::disk('public')->path($file);
        
        // Laravel's response()->file() automatically detects mime types, 
        // but we explicitly enforce Content-Disposition: inline to PREVIEW it in browser
        return response()->file($path, [
            'Content-Disposition' => 'inline; filename="' . basename($file) . '"'
        ]);
    }

    public function cekStatus(\Illuminate\Http\Request $request)
    {
        $nomor = $request->query('nomor');
        $email = $request->query('email');
        $items = collect();
        $error = null;

        if ($email) {
            if ($nomor) {
                $prefix = explode('-', $nomor)[0] ?? '';
                
                $modelClass = match($prefix) {
                    'PMH' => \App\Models\Permohonan::class,
                    'PGD' => \App\Models\Pengaduan::class,
                    'KBR' => \App\Models\Keberatan::class,
                    default => null
                };

                if ($modelClass) {
                    $item = $modelClass::where('no_registrasi', $nomor)
                                       ->where('email', $email)
                                       ->first();
                    if ($item) {
                        $item->jenis_layanan = match($prefix) {
                            'PMH' => 'Permohonan',
                            'PGD' => 'Pengaduan',
                            'KBR' => 'Keberatan',
                            default => 'Layanan'
                        };
                        $items->push($item);
                    } else {
                        $error = 'Data tidak ditemukan. Pastikan Nomor Registrasi dan Email yang dimasukkan benar.';
                    }
                } else {
                    $error = 'Format Nomor Registrasi tidak valid.';
                }
            } else {
                $permohonan = \App\Models\Permohonan::where('email', $email)->get()->map(function($i) { $i->jenis_layanan = 'Permohonan'; return $i; });
                $pengaduan = \App\Models\Pengaduan::where('email', $email)->get()->map(function($i) { $i->jenis_layanan = 'Pengaduan'; return $i; });
                $keberatan = \App\Models\Keberatan::where('email', $email)->get()->map(function($i) { $i->jenis_layanan = 'Keberatan'; return $i; });
                
                $items = $permohonan->concat($pengaduan)->concat($keberatan)->sortByDesc('created_at');
                
                if ($items->isEmpty()) {
                    $error = 'Tidak ada riwayat pengajuan yang ditemukan untuk email ini.';
                }
            }
        }

        return view('pages.cek-status', compact('items', 'nomor', 'email', 'error'));
    }
}
