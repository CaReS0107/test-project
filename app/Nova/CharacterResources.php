<?php

namespace App\Nova;

use App\Models\Character;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CharacterResources extends Resource
{
    public static $model = Character::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'nickname', 'portrayed'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Full Name', 'name')->sortable(),
            Date::make('Date of birth', 'dob')->hideFromIndex(),
            Text::make('Ocupation', 'occupations')->hideFromIndex(),
            Avatar::make('Avatar', 'character_avatar'),
            Text::make('Nickname', 'nickname')->hideFromIndex(),
            Text::make('Portrayed', 'portrayed')->sortable(),

            BelongsTo::make('Quote', 'quote', QuoteResources::class)->hideFromIndex(),
            BelongsToMany::make('Episodes', 'episodes', EpisodeResources::class)
        ];
    }
}
