<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Keberatan;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;

class AuthMainController extends Controller
{
    public function index()
    {
        $layanan = [
            'permohonan' => ['judul' => 'Permohonan Informasi', 'model' => Permohonan::class],
            'pengaduan'  => ['judul' => 'Pengaduan',            'model' => Pengaduan::class],
            'keberatan'  => ['judul' => 'Keberatan',            'model' => Keberatan::class],
        ];

        foreach ($layanan as $kunci => $l) {
            $layanan[$kunci]['total'] = $l['model']::count();
            $layanan[$kunci]['baru']  = $l['model']::where('status', 'diterima')->count(); // belum ditangani
        }

        return view('admin.dashboard', [
            'user'     => Auth::user(),
            'dokumen'  => Informasi::count(),
            'tampil'   => Informasi::tampil()->count(),
            'layanan'  => $layanan,
        ]);
    }
}