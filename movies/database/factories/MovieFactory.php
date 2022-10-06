<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->paragraph(),
            'genre' => fake()->paragraph(),
            'runtime' => fake()->randomDigitNotNull(),
            'director' => fake()->paragraph(),
            'rating' => fake()->randomDigitNotNull(),
            'description'=> fake()->paragraph(),
            'release_date'=> fake()->dateTimeThisDecade(),
        ];
    }
}