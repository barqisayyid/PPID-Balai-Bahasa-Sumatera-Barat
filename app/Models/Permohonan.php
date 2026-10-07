<?php

namespace App\Models;

use App\Models\Concerns\LayananPublik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permohonan extends Model
{
    use LayananPublik, SoftDeletes;

    public const PREFIX_NOMOR = 'PMH';

    /** Cara memperoleh salinan informasi */
    public const RESPON = [
        'langsung' => 'Diambil Langsung di Kantor',
        'email'    => 'Dikirim via Email',
        'pos'      => 'Dikirim via Pos',
        'kurir'    => 'Dikirim via Kurir',
    ];

    protected $table = 'permohonan';

    protected $fillable = [
        'no_registrasi',
        'nama',
        'pekerjaan',
        'alamat',
        'no_hp',
        'email',
        'rincian',
        'tujuan',
        'respon',
        'dokumen',
        'status',
        'tanggapan',
        'ditanggapi_at',
        'ditanggapi_oleh',
    ];

    protected $casts = [
        'ditanggapi_at' => 'datetime',
    ];
}