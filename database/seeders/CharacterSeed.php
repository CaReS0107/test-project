<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Episode;
use Illuminate\Database\Seeder;

class CharacterSeed extends Seeder
{
    public function run()
    {
        $episode = Episode::all();

        Character::factory(100)->create()->each(function ($character) use ($episode){
            $character->episodes()->attach($episode->random(rand(1,4))->pluck('id')->toArray());
        });
    }
}
