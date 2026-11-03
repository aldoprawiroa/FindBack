<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoundItem extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'found_at' => 'datetime',
            'published_at' => 'datetime',
            'operation_version' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function securityPost(): BelongsTo
    {
        return $this->belongsTo(SecurityPost::class);
    }

    public function scopeCatalogView(Builder $query): Builder
    {
        return $query->where('lifecycle', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        $term = trim($filters['q'] ?? '');
        if ($term !== '') {
            $term = '%'.addcslashes($term, '%_\\').'%';
            $query->where(fn (Builder $q) => $q->where('title', 'like', $term)
                ->orWhere('description', 'like', $term)
                ->orWhere('found_location', 'like', $term));
        }

        if ($category = $filters['category'] ?? null) {
            $query->where('category_id', $category);
        }

        if ($post = $filters['post'] ?? null) {
            $query->where('security_post_id', $post);
        }

        return $query;
    }
}