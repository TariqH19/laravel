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
            'title' => fake()->word(),
            'genre' => fake()->word(),
            'runtime' => fake()->randomDigitNotNull(),
            'director' => fake()->words(2,true),
            'rating' => fake()->randomFloat(1, 1, 10),
            'description'=> fake()->paragraph(),
            'release_date'=> fake()->dateTimeThisDecade(),
        ];
    }
}