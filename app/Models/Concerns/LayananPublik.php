<?php

namespace App\Models\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Perilaku bersama untuk Permohonan, Pengaduan, dan Keberatan:
 * nomor registrasi otomatis, status penanganan, dan relasi petugas penanggap.
 * Model pemakai wajib mendefinisikan const PREFIX_NOMOR.
 */
trait LayananPublik
{
    public const STATUS = [
        'diterima' => 'Diterima',
        'diproses' => 'Diproses',
        'selesai'  => 'Selesai',
        'ditolak'  => 'Ditolak',
    ];

    public const STATUS_WARNA = [
        'diterima' => 'secondary',
        'diproses' => 'warning',
        'selesai'  => 'success',
        'ditolak'  => 'danger',
    ];

    protected static function bootLayananPublik(): void
    {
        static::creating(function ($model) {
            if (blank($model->no_registrasi)) {
                $model->no_registrasi = static::buatNomorRegistrasi();
            }
            if (blank($model->status)) {
                $model->status = 'diterima';
            }
        });
    }

    /** Contoh hasil: PMH-20260930-K7Q2XM */
    public static function buatNomorRegistrasi(): string
    {
        $huruf = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // tanpa 0/O/1/I agar mudah dibaca

        do {
            $acak = '';
            for ($i = 0; $i < 6; $i++) {
                $acak .= $huruf[random_int(0, strlen($huruf) - 1)];
            }
            $nomor = static::PREFIX_NOMOR . '-' . now()->format('Ymd') . '-' . $acak;
        } while (static::where('no_registrasi', $nomor)->exists());

        return $nomor;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS[$this->status] ?? ucfirst((string) $this->status);
    }

    public function getStatusWarnaAttribute(): string
    {
        return self::STATUS_WARNA[$this->status] ?? 'secondary';
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        return filled($status) ? $query->where('status', $status) : $query;
    }

    public function penanggap(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditanggapi_oleh');
    }
}