<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{

    protected $model = Character::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->dateTime,
            'occupations' => $this->faker->words,
            'character_avatar' => $this->faker->imageUrl(),
            'nickname' => $this->faker->streetName,
            'portrayed' => $this->faker->name,
            'quote_id' => Quote::query()->inRandomOrder()->first()->id,
        ];
    }
}
