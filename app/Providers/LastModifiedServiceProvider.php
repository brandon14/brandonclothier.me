<?php

namespace App\Providers;

use App\Services\LastModified;
use Illuminate\Support\ServiceProvider;

class LastModifiedServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('lastModified', function ($app) {
            return new LastModified($app, $app['cache.store']);
        });
    }
}
