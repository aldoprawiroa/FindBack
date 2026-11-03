<?php

namespace Database\Seeders;

use App\Models\SecurityPost;
use Illuminate\Database\Seeder;

class SecurityPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            'Gerbang Utama / Rektorat',
            'GKB 1 (Gedung Kuliah Bersama 1)',
            'GKB 2 (Gedung Kuliah Bersama 2)',
            'GKB 3 (Fakultas Kedokteran & Kesehatan)',
        ];

        foreach ($posts as $name) {
            SecurityPost::firstOrCreate(['name' => $name], ['is_active' => true]);
        }
    }
}