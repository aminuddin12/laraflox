<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuPermission extends Model
{
    protected $fillable = [
        'name',
        'route',
        'url',
        'icon',
        'permission_name',
        'parent_id',
        'order',
        'is_active',
    ];

    /**
     * Relasi ke parent menu (jika ini adalah submenu).
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuPermission::class, 'parent_id');
    }

    /**
     * Relasi ke child menu (submenu).
     * Diurutkan berdasarkan 'order'.
     */
    public function children(): HasMany
    {
        return $this->hasMany(MenuPermission::class, 'parent_id')->orderBy('order');
    }

    /**
     * Scope untuk mengambil hanya menu root (level paling atas).
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope untuk mengambil menu aktif dan urut.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
