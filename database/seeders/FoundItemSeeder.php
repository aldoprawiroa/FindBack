<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\FoundItem;
use App\Models\SecurityPost;
use Illuminate\Database\Seeder;

class FoundItemSeeder extends Seeder
{
    public function run(): void
    {
        $gkb1 = SecurityPost::where('name', 'like', '%GKB 1%')->first();
        $gkb2 = SecurityPost::where('name', 'like', '%GKB 2%')->first();
        $rektorat = SecurityPost::where('name', 'like', '%Rektorat%')->first();

        $catElectronics = Category::where('slug', 'electronics')->first();
        $catDocs = Category::where('slug', 'documents')->first();
        $catKeys = Category::where('slug', 'keys')->first();

        $items = [
            [
                'title' => 'Flashdisk Kingston 32GB Warna Hitam',
                'description' => 'Ditemukan tertancap di PC Laboratorium Multimedia nomor 14. Gantungan tali merah.',
                'found_location' => 'Lab Multimedia GKB 1 Lantai 3',
                'found_at' => now()->subDays(2),
                'published_at' => now()->subDays(2),
                'security_post_id' => $gkb1?->id ?? 1,
                'category_id' => $catElectronics?->id ?? 1,
            ],
            [
                'title' => 'KTM (Kartu Tanda Mahasiswa) an. Mahasiswa TI',
                'description' => 'KTM UNIMUS ditemukan terjatuh di area tangga penghubung lantai 1 ke lantai 2.',
                'found_location' => 'Tangga Utama GKB 2',
                'found_at' => now()->subDay(),
                'published_at' => now()->subDay(),
                'security_post_id' => $gkb2?->id ?? 2,
                'category_id' => $catDocs?->id ?? 2,
            ],
            [
                'title' => 'Kunci Motor Honda dengan Gantungan Karakter',
                'description' => 'Kunci kontak motor ditemukan di bangku lobi pos satpam gerbang utama.',
                'found_location' => 'Parkiran Gerbang Utama UNIMUS',
                'found_at' => now()->subHours(6),
                'published_at' => now()->subHours(5),
                'security_post_id' => $rektorat?->id ?? 1,
                'category_id' => $catKeys?->id ?? 4,
            ],
        ];

        foreach ($items as $data) {
            FoundItem::create([
                ...$data,
                'lifecycle' => 'published',
                'operation_version' => 1,
            ]);
        }
    }
}