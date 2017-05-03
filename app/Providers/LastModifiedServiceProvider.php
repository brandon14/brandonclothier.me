<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class LastModifiedServiceProvider extends ServiceProvider
{
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

    protected function getLastModifiedDate()
    {
        date_default_timezone_set(config('app.timezone'));

        $timeStamp = null;

        $directories = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->app->basePath()));

        foreach ($directories as $path => $object) {
            if (basename($path)!== '.ftpquota' &&
                basename($path) !== 'DO_NOT_UPLOAD_HERE' &&
                basename($path) !== 'tmp') {
                $timeStamp = filemtime($path) > $timeStamp ? filemtime($path) : $timeStamp;
            }
        }

        return date("F jS, Y", $timeStamp) . " at " . date("h:i:s A T", $timeStamp);
    }
}
