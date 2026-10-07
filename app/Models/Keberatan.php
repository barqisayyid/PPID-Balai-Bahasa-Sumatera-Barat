<?php

namespace App\Models;

use App\Models\Concerns\LayananPublik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keberatan extends Model
{
    use LayananPublik, SoftDeletes;

    public const PREFIX_NOMOR = 'KBR';

    /** Alasan pengajuan keberatan (sesuai pilihan di formulir publik) */
    public const ALASAN = [
        'a' => 'Permintaan informasi ditolak',
        'b' => 'Informasi berkala tidak disediakan',
        'c' => 'Permintaan informasi tidak ditanggapi',
        'd' => 'Permintaan informasi ditanggapi tidak sebagaimana yang diminta',
        'e' => 'Permintaan informasi tidak dipenuhi',
        'f' => 'Biaya yang dikenakan tidak wajar',
        'g' => 'Informasi disampaikan melebihi jangka waktu yang ditentukan',
    ];

    /** Cara pengiriman tanggapan keberatan */
    public const RESPON = [
        'langsung' => 'Diambil Langsung di Kantor',
        'email'    => 'Dikirim via Email',
        'pos'      => 'Dikirim via Pos',
        'kurir'    => 'Dikirim via Kurir',
    ];

    protected $table = 'keberatan';

    protected $fillable = [
        'no_registrasi',
        'nama',
        'pekerjaan',
        'alamat',
        'no_hp',
        'email',
        'alasan',
        'rincian',
        'tujuan',
        'tanggal_permohonan',
        'respon',
        'dokumen',
        'status',
        'tanggapan',
        'ditanggapi_at',
        'ditanggapi_oleh',
    ];

    protected $casts = [
        'tanggal_permohonan' => 'date',
        'ditanggapi_at'      => 'datetime',
    ];

    public function getAlasanLabelAttribute(): string
    {
        return self::ALASAN[$this->alasan] ?? (string) $this->alasan;
    }
}