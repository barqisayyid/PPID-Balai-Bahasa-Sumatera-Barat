<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'aksi',
        'model_type',
        'model_id',
        'keterangan',
        'perubahan',
        'ip_address',
    ];

    protected $casts = [
        'perubahan' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper statis — catat aksi dari mana saja dengan satu baris kode
     */
    public static function catat(
        string $aksi,
        Model  $model,
        string $keterangan = '',
        array  $perubahan = [],
    ): void {
        static::create([
            'user_id'    => auth()->id(),
            'aksi'       => $aksi,
            'model_type' => get_class($model),
            'model_id'   => $model->getKey(),
            'keterangan' => $keterangan,
            'perubahan'  => $perubahan ?: null,
            'ip_address' => request()->ip(),
        ]);
    }
}