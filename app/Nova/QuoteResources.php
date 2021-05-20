<?php

namespace App\Nova;

use App\Models\Quote;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class QuoteResources extends Resource
{
    public static $model = Quote::class;

    public static $title = 'quote';

    public static $search = [
        'quote',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('quote', 'quote')->sortable(),
        ];
    }
}
