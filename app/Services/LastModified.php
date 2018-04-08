<?php

namespace App\Services;

use Carbon\Carbon;
use DirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use App\Contracts\Services\LastModified as LastModifiedInterface;

class LastModified implements LastModifiedInterface
{
    /**
     * Application cache store.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    private $cache;

    /**
     * Base path to start the file traversal.
     *
     * @var string
     */
    private $basePath;

    /**
     * Whether to cache the timestamp or not.
     *
     * @var bool
     */
    private $cacheTimestamp;

    /**
     * How long to cache the last modified timestamp for.
     *
     * @var int
     */
    private $cacheTtl;

    /**
     * Cache key.
     *
     * @var string
     */
    private $cacheKey;

    /**
     * List of directories to traverse to determine last modified file time.
     *
     * @var array
     */
    private $includedDirectories;

    /**
     * Constructs a LastModified service object.
     *
     * @param \Illuminate\Contracts\Cache\Repository $cache
     * @param string                                 $basePath
     * @param bool                                   $cacheTimestamp
     * @param int                                    $cacheTtl
     * @param string                                 $cacheKey
     * @param array                                  $includedDirectories
     *
     * @return void
     */
    public function __construct(
        CacheRepository $cache,
        $basePath,
        $cacheTimestamp = true,
        $cacheTtl = 30,
        $cacheKey = 'last_modified',
        $includedDirectories = []
    ) {
        $this->cache = $cache;
        $this->basePath = $basePath;
        $this->cacheTimestamp = $cacheTimestamp;
        $this->cacheTtl = $cacheTtl;
        $this->cacheKey = $cacheKey;
        $this->includedDirectories = $includedDirectories;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastModifiedTime()
    {
        // Check the cache.
        if ($this->cacheTimestamp && $this->cache->has($this->cacheKey)) {
            return Carbon::createFromTimestamp($this->cache->get($this->cacheKey));
        }

        $timestamp = null;
        $mTime = -1;

        $basePathFiles = new DirectoryIterator($this->basePath);

        // Iterate over each file in the base directory.
        foreach ($basePathFiles as $file) {
            if (! $file->isDir()) {
                $mTime = $file->getMTime();
                $timestamp = $mTime > $timestamp ? $mTime : $timestamp;
            }
        }

        // Iterate over each included directory recursively to find the last
        // modified timestamp.
        foreach ($this->includedDirectories as $directory) {
            $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

            foreach ($dir as $file) {
                if (! $file->isDir()) {
                    $mTime = $file->getMTime();
                    $timestamp = $mTime > $timestamp ? $mTime : $timestamp;
                }
            }
        }

        // Cache timestamp.
        if ($this->cacheTimestamp) {
            $this->cache->put($this->cacheKey, $timestamp, $this->cacheTtl);
        }

        return Carbon::createFromTimestamp($timestamp);
    }
}
