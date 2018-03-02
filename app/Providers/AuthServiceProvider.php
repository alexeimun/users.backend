<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        Passport::personalAccessClient(env('PERSONAL_ACCESS_CLIENT', ''));
        Passport::tokensCan([
            'ad-management' => 'scope management',
            'ad-content' => 'scope content',
            'ad-courses' => 'scope courses',
            'ad-banner' => 'scope banner',
            'pin-generate' => 'scope pins',
            'pin-validate' => 'scope pins',
            'pin-status' => 'scope pins',
            'pin-lots' => 'scope pins',
            'tomi-padlock' => 'scope tomi'
        ]);

        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
    }
}
