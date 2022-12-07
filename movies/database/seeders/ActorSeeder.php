<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actor::factory()
        ->times(3)
        ->create();

        foreach(Actor::all() as $actor){
            $movies= Movie::inRandomOrder()->take(rand(1,3))->pluck('id');
            $actor->movies()->attach($movies);
        }
    }
}