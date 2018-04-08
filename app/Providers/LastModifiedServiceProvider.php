<?php

namespace App\Providers;

use App\Services\LastModified;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Services\LastModified as LastModifiedInterface;

class LastModifiedServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register a LastModified service in the IoC container.
     *
     * @return void
     */
    public function register()
    {
        $config = $this->app->make('config');

        // Bind the last modified interface in the IoC container as a
        // singleton.
        $this->app->singleton(LastModifiedInterface::class, function ($app) use ($config) {
            return new LastModified(
                $app->make('cache.store'),
                $app->make('path.base'),
                $config->get('lastmodified.cache'),
                $config->get('lastmodified.cache_ttl'),
                $config->get('lastmodified.cache_key'),
                $config->get('lastmodified.included_directories')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [LastModifiedInterface::class];
    }
}
