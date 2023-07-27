<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'title' => $this->faker->realTextBetween(5, 100),
            'description' => $this->faker->realText(255),
            'body' => $this->faker->realText(1024),
            'published_at' => $this->faker->optional()->dateTimeThisMonth(),
        ];
    }
}
