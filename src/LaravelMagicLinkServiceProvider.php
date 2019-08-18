<?php

namespace Airranged\LaravelMagicLink;

use Illuminate\Support\ServiceProvider;

class LaravelMagicLinkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('magic.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-magic-link');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {

            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views/' => resource_path('views/'),
            ], 'views');

            $this->publishes([
                __DIR__.'/config/config.php' => config_path('magic.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'magic');
    }
}
