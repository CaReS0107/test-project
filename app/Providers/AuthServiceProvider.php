<?php

namespace App\Providers;

use App\Models\Character;
use App\Models\Episode;
use App\Models\Quote;
use App\Models\User;
use App\Policies\CharacterPolicy;
use App\Policies\EpisodePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Character::class => CharacterPolicy::class,
        Episode::class => EpisodePolicy::class,
        Quote::class => EpisodePolicy::class,
        User::class => UserPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
