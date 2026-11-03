<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pusat Barang Temuan') · FindBack UNIMUS</title>
    <script>
        try { 
            document.documentElement.dataset.theme = localStorage.getItem('findback-theme') === 'dark' ? 'dark' : 'light'; 
        } catch (_) { 
            document.documentElement.dataset.theme = 'light'; 
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a href="#main" class="skip-link">Lewati ke konten utama</a>
    <div class="auth-shell app-shell">
        <header class="site-header">
            <a href="{{ route('home') }}" class="wordmark" aria-label="FindBack, beranda">
                Find<span>Back</span><small>UNIMUS Find &amp; Return</small>
            </a>
            <button type="button" class="theme-toggle" data-theme-toggle aria-pressed="false">Mode gelap</button>
        </header>

        <div class="app-body">
            <aside class="app-sidebar">
                <p class="demo-label">UNIMUS LOST &amp; FOUND</p>
                <details class="app-menu" open data-app-menu>
                    <summary class="app-menu-toggle">Menu Navigasi</summary>
                    <nav class="app-nav" aria-label="Navigasi aplikasi">
                        <div class="nav-group">
                            <p class="nav-label">Temukan</p>
                            <a href="{{ route('home') }}" aria-current="page">Katalog barang</a>
                        </div>
                        <div class="nav-group">
                            <p class="nav-label">Informasi</p>
                            <a href="#tentang">Tentang FindBack</a>
                            <a href="#pos">Pos Satpam Kampus</a>
                        </div>
                    </nav>
                </details>
            </aside>

            <main id="main" class="app-content">
                @yield('content')
            </main>
        </div>

        <footer class="site-footer">
            <p>&copy; {{ date('Y') }} FindBack Kelompok 5 — Pemrograman Berbasis Web UNIMUS.</p>
            <p>Ditemukan. Diamankan. Dikembalikan.</p>
        </footer>
    </div>
</body>
</html>