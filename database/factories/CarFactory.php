<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarCarcase;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(10),
            'body' => $this->faker->realText(50),
            'price' => $price = $this->faker->numberBetween(500000, 50000000),
            'old_price' => $this->faker->optional()->numberBetween($price*1.1, $price*1.2),
            'salon' => $this->faker->optional()->realText(),
            'kpp' => $this->faker->optional()->realText(),
            'year' => $this->faker->optional()->year(),
            'color' => $this->faker->optional()->word(),
            'is_new' => $this->faker->boolean(),
            'engine_id' => CarEngine::factory(),
            'carcase_id' => CarCarcase::factory(),
            'class_id' => CarClass::factory(),
            'image_id' => Image::factory(),
        ];
    }
}
