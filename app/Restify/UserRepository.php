<?php

namespace App\Restify;

use App\Models\User;
use Binaryk\LaravelRestify\Fields\Field;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    public static $model = User::class;

    public function fields(RestifyRequest $request)
    {
        return [

            Field::make('email')->storingRules('required', 'unique:users')->messages([
                    'required' => 'This field is required.',
                ]),

            Field::make('password')
                ->value(fn(Request $request) => Hash::make($request->input('password')))
                ->rules('required')
                ->storingRules('confirmed')
                ->hidden(),
        ];
    }
}
