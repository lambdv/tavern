<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tavern;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(10),
            'body' => fake()->realText(500),
            'trending' => false,
            'user_id' => fake()->numberBetween(0, 100),
            'tavern_id' => Tavern::inRandomOrder()->first()->id,
        ];
    }
}
