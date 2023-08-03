<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Легковые'],
            ['name' => 'Внедорожники'],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки'],
        ];
        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);
            Category::factory()->create($category);
        }

    }
}
