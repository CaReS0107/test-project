<?php

namespace App\Restify;

use App\Models\Quote;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class QuoteRepository extends Repository
{
    public static $model = Quote::class;

    public static $search = [
        'quote'
    ];

    public function fields(RestifyRequest $request)
    {
        return [
            field('quote')->storingRules('required'),
        ];
    }
}
