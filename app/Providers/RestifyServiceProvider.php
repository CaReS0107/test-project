<?php

namespace App\Providers;

use App\Http\Requests\RegisterRequest;
use Binaryk\LaravelRestify\Services\RegisterService;
use Illuminate\Support\Facades\Gate;
use Binaryk\LaravelRestify\RestifyApplicationServiceProvider;

class RestifyServiceProvider extends RestifyApplicationServiceProvider
{

    public function boot()
    {
        RegisterService::$registerFormRequest = RegisterRequest::class;
        parent::boot();
    }


    protected function gate()
    {
        Gate::define('viewRestify', function ($user) {
            return true;
        });
    }

    public function register()
    {
        //
    }
}
