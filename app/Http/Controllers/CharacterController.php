<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!$request->has('name')){
            return Character::all();
        }

        $name = $request->query('name');

        return Character::query()->where('name', 'LIKE',"%{$name}%")->get();
    }
}
