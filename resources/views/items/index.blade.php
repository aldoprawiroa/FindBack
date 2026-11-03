@extends('layouts.app')

@section('title', 'Katalog Barang Temuan')

@section('content')
<header class="app-heading catalog-heading">
    <div>
        <p class="eyebrow">Pusat Informasi Kampus</p>
        <h1>Mungkin ini barang Anda yang hilang?</h1>
        <p>Telusuri daftar barang temuan yang telah diamankan dan dicatat oleh petugas keamanan pos kampus UNIMUS.</p>
    </div>
</header>

<p class="catalog-notice">
    <strong>Sistem Lost &amp; Found Terpadu:</strong> Data di bawah merupakan barang temuan aktif yang berada di pos pengamanan UNIMUS.
</p>

<!-- Form Filter & Pencarian -->
<form method="GET" action="{{ route('home') }}" class="catalog-filters">
    <div class="field">
        <label for="q">Pencarian Barang</label>
        <input id="q" name="q" type="search" maxlength="100" value="{{ $filters['q'] ?? '' }}" placeholder="Contoh: Flashdisk, KTM, Kunci...">
    </div>

    <div class="field">
        <label for="category">Kategori</label>
        <select id="category" name="category">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(($filters['category'] ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="field">
        <label for="post">Pos Penyimpanan</label>
        <select id="post" name="post">
            <option value="">Semua Pos Kampus</option>
            @foreach($posts as $post)
                <option value="{{ $post->id }}" @selected(($filters['post'] ?? '') == $post->id)>
                    {{ $post->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="button primary compact-button" type="submit">Terapkan Filter</button>
    <a class="inline-link" href="{{ route('home') }}">Reset</a>
</form>

<!-- Grid Daftar Barang -->
<div class="item-grid">
@forelse($items as $item)
    <article class="item-card">
        <div class="item-photo-link">
            <div class="photo-error">
                <span>📦 {{ $item->category->name }}</span>
            </div>
        </div>
        <div class="item-card-copy">
            <p class="item-status status-label" data-state="published">Tersedia di Pos</p>
            <h2><a href="#">{{ $item->title }}</a></h2>
            <p><strong>Lokasi Temuan:</strong> {{ $item->found_location }}</p>
            <p><strong>Pos Satpam:</strong> {{ $item->securityPost->name }}</p>
            <p class="fine-print">
                Dicatat: {{ $item->found_at ? $item->found_at->format('d/m/Y H:i') : '-' }} WIB
            </p>
        </div>
    </article>
@empty
    <section class="catalog-empty">
        <p class="eyebrow">Tidak Ditemukan</p>
        <h2>Belum ada barang temuan yang cocok.</h2>
        <p>Coba gunakan kata kunci lain atau ubah pilihan kategori dan pos kampus.</p>
    </section>
@endforelse
</div>

<!-- Navigasi Pagination -->
@if($items->hasPages())
<nav class="item-pagination" aria-label="Navigasi Halaman">
    @if($items->previousPageUrl())
        <a href="{{ $items->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a>
    @endif
    <span>Halaman {{ $items->currentPage() }} dari {{ $items->lastPage() }}</span>
    @if($items->nextPageUrl())
        <a href="{{ $items->nextPageUrl() }}" rel="next">Berikutnya &raquo;</a>
    @endif
</nav>
@endif
@endsection