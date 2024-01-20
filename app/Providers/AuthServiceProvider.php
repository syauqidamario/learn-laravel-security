<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Providers\Guard\TokenGuard;
use App\Providers\User\SimpleUserProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::extend("token", function (Application $app, string $name, array $config) {
            $guard = new TokenGuard(Auth::createUserProvider($config["provider"]), $app->make(Request::class));
            $app->refresh('request', $guard, 'setRequest');
            return $guard;
        });

        Auth::provider("simple", function (Application $app, array $config) {
            return new SimpleUserProvider();
        });
    }
}
