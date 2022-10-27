<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserts data into the database this data is in the movie factory, we can also control the amount of times the database is seeded by passing a number in the times method
        Movie::factory()->times(5)->create();
    }
}