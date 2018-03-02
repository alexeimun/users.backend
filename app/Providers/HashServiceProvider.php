<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HashServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->singleton('hash', function ($app) {
            return $app->make('App\Bridge\MD5Hasher');
        });
        
        unset($this->app->availableBindings['hash']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['hash'];
    }

}