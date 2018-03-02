<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $lang = $this->app->request->has('lang') ? $this->app->request->input('lang') : 'es';
        $this->app['translator']->setLocale($lang);
    }
}