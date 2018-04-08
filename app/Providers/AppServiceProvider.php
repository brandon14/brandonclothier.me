<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ViewComposers\LastModifiedComposer;
use Illuminate\Contracts\View\Factory as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ViewFactory $viewFactory)
    {
        // Register a last modified view composer for the lastmodified partial view.
        // This will provide a variable $lastModified that is a Carbon instance returned
        // from the @link{App\COntracts\Services\LastModified} implementation.
        $viewFactory->composer('partials.lastmodified', LastModifiedComposer::class);
    }
}
