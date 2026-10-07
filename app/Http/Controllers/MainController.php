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
}
