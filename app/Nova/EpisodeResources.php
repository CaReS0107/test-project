<?php

namespace App\Nova;

use App\Models\Episode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class EpisodeResources extends Resource
{
    public static $model = Episode::class;

    public static $title = 'title';

    public static $search = [
        'id', 'air_date', 'title',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            $this->when(
                $this->air_date,
                Text::make('Air date')
                    ->displayUsing(fn ($value) => Carbon::make($value)->diffForHumans())
                    ->sortable(),
            ),

            Text::make('Title', 'title')->sortable(),

            BelongsTo::make('Quote', 'quote', QuoteResources::class),
            BelongsToMany::make('Characters', 'characters', CharacterResources::class)
        ];
    }
}
