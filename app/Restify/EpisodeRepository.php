<?php

namespace App\Restify;

use App\Models\Episode;
use Binaryk\LaravelRestify\Contracts\RestifySearchable;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class EpisodeRepository extends Repository
{
    public static $model = Episode::class;

    public static $search = ['title'];

    public static $match = [
        'air_date' => RestifySearchable::MATCH_DATETIME_INTERVAL,
    ];

    public static function related(): array
    {
        return [
            'quote' => BelongsTo::make('quote', 'quote', QuoteRepository::class),
            'characters' => BelongsToMany::make('characters', 'characters', CharacterRepository::class)->unique(),
        ];
    }

    public
    function fields(RestifyRequest $request)
    {
        return [
            field('air_date')->storingRules('required'),
            field('title')->storingRules('required'),
        ];
    }
}
