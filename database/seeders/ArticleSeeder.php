<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = Image::get();
        for ($i = 0; $i < 5; $i++) {
            Article::factory()->create([
                'image_id' => $images->random()
            ]);
        }
    }
}
