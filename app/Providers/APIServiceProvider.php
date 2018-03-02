<?php

namespace App\Providers;

use App\Models\Remote\Model;
use App\Services\APIClient;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class APIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Model::setClient($this->app['api-client']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('api-client', function () {

            $guzzleClient = new Client([
                'base_uri' => !$this->app->environment('testing') ? 'http://localhost:8084/v1/' : 'http://pruebas.api.spotalk.net/v1/',
                'http_errors' => true,
            ]);
            
            return new APIClient($guzzleClient);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['api-client'];
    }
}