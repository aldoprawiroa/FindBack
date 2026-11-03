<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_demo' => 'boolean',
        ];
    }

    public function foundItems(): HasMany
    {
        return $this->hasMany(FoundItem::class);
    }
}