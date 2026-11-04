@extends('layouts.app')

@section('title', $item->title)

@section('content')
<nav class="breadcrumbs" aria-label="Navigasi rekam jejak">
    <a href="{{ route('home') }}">&larr; Kembali ke Katalog Barang</a>
</nav>

<article class="item-detail">
    <div class="item-detail-photo">
        <div class="photo-error">
            <span style="font-size: 2rem;">📦</span>
            <p style="margin-top: var(--space-2);">Foto dokumentasi pos tersimpan</p>
            <small class="fine-print">Kategori: {{ $item->category->name }}</small>
        </div>
    </div>

    <div class="item-detail-copy">
        <p class="item-status status-label" data-state="published">Tersedia di Pos Pengamanan</p>
        <h1 style="font-size: 1.75rem; margin-top: var(--space-2);">{{ $item->title }}</h1>

        <div class="workflow-panel" style="margin-top: var(--space-5);">
            <h2>Informasi Penemuan &amp; Penyimpanan</h2>
            <p><strong>Lokasi Ditemukan:</strong> {{ $item->found_location }}</p>
            <p><strong>Pos Pengamanan Saat Ini:</strong> {{ $item->securityPost->name }}</p>
            <p><strong>Waktu Penemuan:</strong> {{ $item->found_at ? $item->found_at->format('d F Y, H:i') : '-' }} WIB</p>
            <p><strong>Waktu Pencatatan Sistem:</strong> {{ $item->published_at ? $item->published_at->format('d F Y, H:i') : '-' }} WIB</p>
        </div>

        <div class="workflow-panel" style="margin-top: var(--space-4);">
            <h2>Deskripsi Fisik Barang</h2>
            <p class="item-description">{{ $item->description }}</p>
        </div>

        <div class="notice" style="margin-top: var(--space-5);">
            <p><strong>Prosedur Klaim &amp; Pengambilan Barang:</strong></p>
            <p>Jika barang ini adalah milik Anda, silakan kunjungi <strong>{{ $item->securityPost->name }}</strong> secara langsung dengan membawa Kartu Tanda Mahasiswa (KTM) atau kartu identitas resmi, serta bukti kepemilikan yang sah untuk dilakukan verifikasi fisik oleh petugas satpam.</p>
        </div>
    </div>
</article>
@endsection