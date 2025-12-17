<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'label',
        'value',
        'type',
        'description',
        'options',
        'is_system',
        'sync_env',
        'env_key',
    ];

    protected $casts = [
        'is_system' => 'boolean',
        'sync_env' => 'boolean',
        'options' => 'array',
    ];

    /**
     * Helper untuk mengambil value setting berdasarkan key.
     * Menggunakan Cache untuk performa.
     * * UPDATE: Diganti menjadi 'getValue' untuk menghindari konflik dengan Eloquent.
     */
    public static function getValue($key, $default = null)
    {
        // Cache settings selama 24 jam, hapus cache jika ada update
        $settings = Cache::remember('site_settings_all', 60 * 60 * 24, function () {
            return self::all()->keyBy('key');
        });

        if (isset($settings[$key])) {
            return $settings[$key]->value;
        }

        return $default;
    }

    /**
     * Helper untuk menghapus cache saat update/create/delete.
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('site_settings_all');
        });

        static::deleted(function () {
            Cache::forget('site_settings_all');
        });
    }
}
