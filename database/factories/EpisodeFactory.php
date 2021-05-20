<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{

    protected $model = Episode::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'air_date' => $this->faker->date(),
            'quote_id' => Quote::query()->inRandomOrder()->first()->id
        ];
    }
}
