<?php

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;

class UserPolicy
{
    use HandlesAuthorization;

    public function allowRestify(Authenticatable $user)
    {
        return true;
    }

    public function show(Authenticatable $user)
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

    public function update(Authenticatable $user)
    {
        return true;
    }


    public function updateBulk(Authenticatable $user)
    {
        return true;
    }

    public function delete(Authenticatable $user)
    {
        return true;
    }

    public function view()
    {
        return true;
    }

    public function create(Authenticatable $user)
    {
        return true;
    }

}
