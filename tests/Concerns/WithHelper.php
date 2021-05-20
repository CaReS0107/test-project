<?php

namespace Tests\Concerns;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\Sanctum;

trait WithHelper
{
    /**
     * @param Authenticatable|User $user
     */
    public function authentificateAs(Authenticatable $user)
    {
        return Sanctum::actingAs($user);
    }

    public function fakerUser($attributes = []): User
    {
        return User::factory()->create($attributes);
    }
}
