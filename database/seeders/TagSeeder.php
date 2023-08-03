<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();

        foreach (Article::get() as $article) {
            $article->tags()->saveMany($tags->random(rand(0, 3)));
        }
        foreach (Car::get() as $car) {
            $car->tags()->saveMany($tags->random(rand(0, 3)));
        }
    }
}
