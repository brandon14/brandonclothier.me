<?php

namespace App\Providers;

use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param  \Illuminate\Broadcasting\BroadcastManager  $broadcast
     *
     * @return void
     */
    public function boot(BroadcastManager $broadcast)
    {
        $broadcast->routes();

        require $this->app->basePath().'/routes/channels.php';
    }
}
