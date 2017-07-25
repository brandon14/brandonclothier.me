<?php

namespace App\Services;

use DirectoryIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Cache\Repository as CacheRepository;

class LastModified
{
    /**
     * Application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $app;
    /**
     * Application cache store.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    private $cache;

    /**
     * List of directories to traverse to determine last modified file time.
     * This array is built in the function {@link buildIncludedDirectoies}.
     *
     * @var array
     */
    private $includedDirectories = [];

    /**
     * Constructs a LastModified service object.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param \Illuminate\Contracts\Cache\Repository       $cache
     */
    public function __construct(Application $app, CacheRepository $cache)
    {
        $this->app = $app;
        $this->cache = $cache;
        $this->buildIncludedDirectories();
    }

    /**
     * [buildIncludedDirectories description]
     *
     * @return void
     */
    private function buildIncludedDirectories()
    {
        $appPath = $this->app->make('path');
        $configPath = $this->app->make('path.config');
        $publicPath = $this->app->make('path.public');
        $databasePath = $this->app->make('path.database');
        $resourcePath = $this->app->make('path.resources');
        $bootstrapPath = $this->app->make('path.bootstrap');
        $testPath = $this->app->make('path.base').DIRECTORY_SEPARATOR.'tests';

        $this->includedDirectories = [
            $appPath,
            $configPath,
            $publicPath,
            $databasePath,
            $resourcePath,
            $bootstrapPath,
            $testPath,
        ];
    }

    /**
     * Function to get the last modified file time for the web application directory.
     *
     * @return \Carbon\Carbon
     */
    public function getLastModifiedFile()
    {
        $timestamp = null;

        if ($this->cache->has('lastModifiedTime')) {
            $timestamp = $this->cache->get('lastModifiedTime');
        } else {
            foreach ($this->includedDirectories as $directory) {
                $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

                foreach ($dir as $file) {
                    if (! $file->isDir()) {
                        $mTime = $file->getMTime();
                        $timestamp = $mTime > $timestamp ? $mTime : $timestamp;
                    }
                }
            }

            $basePath = new DirectoryIterator($this->app->make('path.base'));

            foreach ($basePath as $file) {
                if (! $file->isDir()) {
                    $mTime = $file->getMTime();
                    $timestamp = $mTime > $timestamp ? $mTime : $timestamp;
                }
            }

            $this->cache->put('lastModifiedTime', $timestamp, 30);
        }

        return Carbon::createFromTimestamp($timestamp);
    }
}
