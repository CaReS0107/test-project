<?php

namespace App\Policies;

use App\Models\Character;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;

class CharacterPolicy
{
    use HandlesAuthorization;

    public function allowRestify(Authenticatable $user)
    {
        return true;
    }

    public function show(Authenticatable $user, Character $character)
    {
        return true;
    }

    public function store(Authenticatable $user)
    {
        return true;
    }

    public function storeBulk(User $user)
    {
        return true;
    }

    public function update(Authenticatable $user, Character $character)
    {
        return $user->id === $character->user_id;
    }


    public function updateBulk(Authenticatable $user, Character $character)
    {
        return $user->id === $character->user_id;
    }

    public function delete(Authenticatable $user, Character $character)
    {
        return $user->id === $character->user_id;
    }

    public function attachCharacter()
    {
        return true;
    }

    public function detachCharacter()
    {
        return true;
    }

    public function view()
    {
        return true;
    }
}
