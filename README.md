# FindBack — Campus Lost & Found System
> **Pusat Pengelolaan Barang Temuan Kampus Universitas Muhammadiyah Semarang**

Proyek Pengembangan Aplikasi Web untuk Mata Kuliah **Pemrograman Berbasis Web**  
Fakultas Ilmu Komputer dan Teknologi Digital (FIKOMDIGI) — Universitas Muhammadiyah Semarang (UNIMUS).

---

## 👥 Tim Pengembang (Kelompok 5)

| No | Nama Mahasiswa | NIM / Akun GitHub | Peran Utama |
| :---: | :--- | :--- | :--- |
| 1 | **Aldo Prawiro Akbar** | [@aldoprawiroa](https://github.com/aldoprawiroa) | Team Lead & Software Architecture |
| 2 | **Abdil Fawasta Rasyadan** | [@abdilrasya100](https://github.com/abdilrasya100) | Frontend UI & Design System |
| 3 | **Faiz Abdan Nirwana** | [@faiznrw745](https://github.com/faiznrw745) | Database Schema & Seeders Engineer |
| 4 | **Ibrahim** | [@Ibrahim](https://github.com/) | Frontend Feature & Catalog Developer |
| 5 | **Raditya Ghiffari Saputra** | [@radityaghiffari](https://github.com/) | QA, Detail Views & Documentation |

---

## 🚀 Fitur Milestone UTS (Progress 25%)

Pada evaluasi tengah semester (UTS), sistem FindBack mencakup fondasi operasional publik:
1. **Arsitektur Framework Modern**: Laravel 13 berbasis PHP 8.3 dengan arsitektur MVC terstandarisasi.
2. **Sistem Desain Khusus UNIMUS**: Tailwind CSS 4 dengan token warna kampus, tipografi *Instrument Sans*, dan dukungan *Dark/Light Mode* otomatis.
3. **Multi-Post Database Schema**: Skema basis data terintegrasi yang menghubungkan pos-pos pengamanan kampus (GKB 1, GKB 2, Rektorat, FK).
4. **Katalog Publik Real-time**: Penelusuran barang temuan dengan filter kategori dan pos pengamanan secara langsung.
5. **Rincian Barang & SOP Fisik**: Halaman detail barang temuan yang memuat deskripsi fisik dan panduan pengambilan barang di pos satpam.

---

## 🛠️ Panduan Menjalankan Proyek Lokal

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/aldoprawiroa/FindBack.git
   cd FindBack
   ```
2. **Instalasi Dependensi PHP & Ekstensi**:
   ```bash
   composer install
   ```
3. **Konfigurasi Lingkungan (.env)**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Pastikan driver database disetel ke MySQL Laragon (`DB_DATABASE=Findback-Kelompok5`).*
4. **Migrasi & Penyemaian Data Awal Kampus**:
   ```bash
   php artisan migrate --seed
   ```
5. **Menjalankan Server**:
   ```bash
   php artisan serve
   ```
   Akses melalui browser di: `http://127.0.0.1:8000` atau Pretty URL Laragon `http://Findback-Kelompok5.test`.