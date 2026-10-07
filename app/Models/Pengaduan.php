<?php

namespace App\Models;

use App\Models\Concerns\LayananPublik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use LayananPublik, SoftDeletes;

    public const PREFIX_NOMOR = 'PGD';

    public const JENIS = [
        'pelayanan' => 'Pelayanan Publik',
        'fasilitas' => 'Fasilitas Kantor',
        'pegawai'   => 'Perilaku Pegawai',
        'informasi' => 'Informasi Publik',
        'lainnya'   => 'Lainnya',
    ];

    /** Cara menerima tanggapan */
    public const RESPON = [
        'email'    => 'Via Email',
        'telepon'  => 'Via Telepon',
        'surat'    => 'Via Surat',
        'langsung' => 'Bertemu Langsung di Kantor',
    ];

    protected $table = 'pengaduan';

    protected $fillable = [
        'no_registrasi',
        'nama',
        'pekerjaan',
        'alamat',
        'no_hp',
        'email',
        'tgl_kejadian',
        'jenis_kejadian',
        'subjek_pengaduan',
        'uraian_pengaduan',
        'harapan',
        'respon',
        'status',
        'tanggapan',
        'ditanggapi_at',
        'ditanggapi_oleh',
    ];

    protected $casts = [
        'tgl_kejadian'  => 'date',
        'ditanggapi_at' => 'datetime',
    ];
}