<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use App\Models\SecurityPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'integer', 'exists:categories,id'],
            'post' => ['nullable', 'integer', 'exists:security_posts,id'],
            'page' => ['nullable', 'integer', 'min:1', 'max:100000'],
        ]);

        $items = FoundItem::query()
            ->catalogView()
            ->filter($filters)
            ->with(['category:id,name', 'securityPost:id,name'])
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(config('found_items.per_page', 12))
            ->withQueryString();

        return view('items.index', [
            'items' => $items,
            'filters' => $filters,
            'categories' => Category::query()->orderBy('name')->get(),
            'posts' => SecurityPost::query()->orderBy('name')->get(),
        ]);
    }
        public function show(FoundItem $item): View
    {
        $item->load(['category:id,name', 'securityPost:id,name']);
        return view('items.show', [
            'item' => $item,
        ]);
    }
}