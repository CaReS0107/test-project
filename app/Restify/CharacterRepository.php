<?php

namespace App\Restify;

use App\Models\Character;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;

class CharacterRepository extends Repository
{
    public static $model = Character::class;

    public static $search = ['name'];

    public static function related(): array
    {
        return [
            'episodes' => BelongsToMany::make('episodes', 'episodes', EpisodeRepository::class)->unique(),
            'quotes' => BelongsTo::make('quote', 'quote', QuoteRepository::class),
        ];
    }

    public function fields(RestifyRequest $request)
    {
        return [
            field('name'),
            field('dob'),
            field('occupations'),
            field('character_avatar'),
            field('nickname'),
            field('portrayed'),
            field('quote_id'),
        ];
    }
}
