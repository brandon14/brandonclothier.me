<?php

namespace App\Providers;

use Carbon\Carbon;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\ServiceProvider;

class LastModifiedServiceProvider extends ServiceProvider
{
    /**
     * List of excluded directories when traversing application folders.
     *
     * @var array
     */
    private $excludedDirectories = [
        'vendor',
        'node_modules',
        'tmp',
        'storage',
        'tests',
        'cache',
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('lastModified', function () {
            return $this->getLastModifiedDate();
        });
    }

    /**
     * Function to get the last modified file time for the web application directory.
     *
     * @return \Carbon\Carbon
     */
    protected function getLastModifiedDate()
    {
        date_default_timezone_set(config('app.timezone'));

        $timeStamp = null;

        $directories = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->app->basePath()));

        foreach ($directories as $path => $object) {
            if (! in_array(basename($path), $this->excludedDirectories, true)) {
                $timeStamp = filemtime($path) > $timeStamp ? filemtime($path) : $timeStamp;
            }
        }

        return Carbon::createFromTimestamp($timeStamp);
    }
}
