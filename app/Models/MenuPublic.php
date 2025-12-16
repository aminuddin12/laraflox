<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuPublic extends Model
{
    protected $fillable = [
        'parent_id',
        'group',
        'type_group',
        'icon',
        'style',
        'url',
        'title',
        'description',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'style' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuPublic::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MenuPublic::class, 'parent_id')->orderBy('order');
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group)
                     ->whereNull('parent_id')
                     ->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
