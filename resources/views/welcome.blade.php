@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="app-heading">
    <p class="eyebrow">Sistem Informasi Pengelolaan Barang Hilang &amp; Temuan</p>
    <h1>Pusat Barang Temuan UNIMUS</h1>
    <p>Tempat terpusat untuk mencari, memverifikasi, dan mengembalikan barang temuan di seluruh lingkungan kampus Universitas Muhammadiyah Semarang.</p>
</div>

<div class="notice">
    <p><strong>Status Proyek (Fase 1 - Fondasi UI):</strong> Desain antarmuka dasar dan layout publik telah terpasang. Modul katalog interaktif dan basis data pos kampus sedang dalam tahap integrasi.</p>
</div>

<section id="pos" class="post-summary" style="margin-top: var(--space-6);">
    <h2>Pos Pengamanan Terintegrasi</h2>
    <p>FindBack menghubungkan seluruh pos satpam kampus (GKB 1, GKB 2, Fakultas Kedokteran, dan Gedung D) ke dalam satu jaringan pencatatan terpadu.</p>
</section>
@endsection