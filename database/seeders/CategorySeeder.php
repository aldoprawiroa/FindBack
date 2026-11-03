<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('found_items.categories') as $slug => $name) {
            Category::firstOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'is_demo' => true]
            );
        }
    }
}