<?php

namespace Database\Seeders;

use App\Models\episode;
use Illuminate\Database\Seeder;

class EpisodeSeed extends Seeder
{
    public function run()
    {
        Episode::factory(30)->create();
    }
}
