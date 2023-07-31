<?php

namespace Database\Seeders;

use App\Models\CarCarcase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarCarcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodies = [
            'Седан',
            'Хетчбек',
            'Универсал',
            'Купе',
            'Родстер',
            'Внедорожник',
            'Рамный',
            'Пикап',
            'Кроссовер',
        ];

        foreach ($bodies as $body) {
            CarCarcase::factory()->create(['name' => $body]);
        }
    }
}
