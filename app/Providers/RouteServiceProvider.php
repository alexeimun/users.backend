<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function registerRoutes()
    {

        /*
         * Routes for version 1 
         */
        $this->app->group([
            'namespace' => 'App\Http\Controllers', 
            'prefix' => 'v1', 
            'middleware' => ['cors',]
        ], function ($app) {
            require base_path('routes/routes-v1.php');
        });

        /*
         * Routes for authentification in ecosystem
         */
        $this->app->group([ 
            'middleware' => ['cors']
        ], function($app){
            require base_path('routes/routes-auth.php');
        }); 

    }


}