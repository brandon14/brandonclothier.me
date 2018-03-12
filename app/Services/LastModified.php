<?php

namespace App\Services;

use Carbon\Carbon;
use DirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
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
     * Whether to cache the timestamp or not.
     *
     * @var boolean
     */
    private $cacheTimestamp;

    /**
     * How long to cache the last modified timestamp for.
     *
     * @var integer
     */
    private $cacheTtl;

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
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @param  boolean  $cacheTimestamp
     * @param  integer  $cacheTtl
     *
     * @return void
     */
    public function __construct(Application $app, CacheRepository $cache, $cacheTimestamp, $cacheTtl)
    {
        $this->app = $app;
        $this->cache = $cache;
        $this->cacheTimestamp = $cacheTimestamp;
        $this->cacheTtl = $cacheTtl;
        $this->buildIncludedDirectories();
    }

    /**
     * Function to populate {@link $this->includedDirectories} with the
     * directories to consider for the last modified file time.
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

        if ($this->cacheTimestamp && $this->cache->has('lastModifiedTime')) {
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

            $this->cache->put('lastModifiedTime', $timestamp, $this->cacheTtl);
        }

        return Carbon::createFromTimestamp($timestamp);
    }
}
