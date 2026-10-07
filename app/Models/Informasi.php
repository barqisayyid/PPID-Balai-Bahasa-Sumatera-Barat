<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informasi extends Model
{
    use SoftDeletes;

    protected $table = 'informasi';

    /** Kategori => label. Kunci dipakai di URL admin dan filter situs publik. */
    public const KATEGORI = [
        'berkala'   => 'Informasi Berkala',
        'kebijakan' => 'Regulasi / Kebijakan',
        'keuangan'  => 'Informasi Keuangan',
        'program'   => 'Program & Kegiatan',
        'statistik' => 'Statistik & Capaian',
    ];

    /**
     * Kolom opsional yang dipakai tiap kategori (sesuai kolom tabel di situs publik).
     * Kolom nama, tahun, dokumen, dan tampil dipakai semua kategori.
     */
    public const FIELD = [
        'berkala'   => ['jenis_informasi', 'pj'],
        'kebijakan' => ['jenis_informasi'],
        'keuangan'  => ['pj'],
        'program'   => ['jenis_informasi', 'pj'],
        'statistik' => ['pj'],
    ];

    protected $fillable = [
        'kategori',
        'nama',
        'jenis_informasi',
        'tahun',
        'pj',
        'dokumen',
        'tampil',
    ];

    protected $casts = [
        'tampil' => 'boolean',
    ];

    public static function fieldAktif(string $kategori): array
    {
        return self::FIELD[$kategori] ?? [];
    }

    public static function labelJenis(string $kategori): string
    {
        return $kategori === 'kebijakan' ? 'Jenis Dokumen' : 'Jenis Informasi';
    }

    public function scopeKategori(Builder $query, string $kategori): Builder
    {
        return $query->where('kategori', $kategori);
    }

    /** Hanya yang ditampilkan di situs publik. */
    public function scopeTampil(Builder $query): Builder
    {
        return $query->where('tampil', true);
    }

    public function getKategoriLabelAttribute(): string
    {
        return self::KATEGORI[$this->kategori] ?? $this->kategori;
    }
}