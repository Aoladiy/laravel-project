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
            [
                'name' => 'легковые',
                'children' => [
                    ['name' => 'Седаны', 'sort' => 1],
                    ['name' => 'Хетчбеки', 'sort' => 1],
                    ['name' => 'Универсалы', 'sort' => 1],
                    ['name' => 'Купе', 'sort' => 1],
                    ['name' => 'Родстеры', 'sort' => 1],
                ],
            ],
            [
                'name' => 'Внедорожники',
                'children' => [
                    ['name' => 'Рамные', 'sort' => 1],
                    ['name' => 'Пикапы', 'sort' => 1],
                    ['name' => 'Кроссоверы', 'sort' => 1],
                ],
            ],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки'],
        ];
        foreach ($this->categoriesSlug($categories) as $category) {
            Category::create($category);
        }
    }

    private function categoriesSlug(array $categories): array
    {
        array_walk($categories, function (&$category) {
            if (isset($category['children'])) {
                $category['children'] =
                    $this->categoriesSlug($category['children']);
            }
            $category['slug'] = Str::slug($category['name']);
        });
        return $categories;
    }
}
