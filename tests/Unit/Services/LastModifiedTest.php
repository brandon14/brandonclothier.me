<?php

namespace Tests\Unit\Services;

use Mockery;
use Carbon\Carbon;
use Tests\TestCase;
use App\Services\LastModified;
use Illuminate\Contracts\Cache\Repository;
use org\bovigo\vfs\vfsStream as VfsStream;

class LastModifiedTest extends TestCase
{
    /**
     * Mocked filesystem using vfsStream.
     *
     * @var \org\bovigo\vfs\
     */
    private $fileSystem;

    /**
     * Array of files we create using vfsStream.
     *
     * @var array
     */
    private $files = [];

    /**
     * Whether to cache timestamp.
     *
     * @var bool
     */
    private $cacheTimestamp;

    /**
     * Cache time-to-live.
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
     * Set up LastModified service test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        // Set up a virtual filesystem to test on.
        $this->fileSystem = VfsStream::setup('root');

        $directoryTests = VfsStream::newDirectory('tests');
        $directoryApp = VfsStream::newDirectory('app');

        $testFileOne = VfsStream::newFile('someTest.php', 644)->withContent('<?php echo "this is a test.";');
        $testFileTwo = VfsStream::newFile('this_is_a_test.txt', 644)->withContent('Some text here I think.');

        $directoryTests->addChild($testFileOne);
        $directoryApp->addChild($testFileTwo);

        $this->fileSystem->addChild($directoryTests);
        $this->fileSystem->addChild($directoryApp);

        // Set our test files wo we can modified the timestamps of them later.
        $this->files = [
            'testFileOne' => $testFileOne,
            'testFileTwo' => $testFileTwo,
        ];

        $this->cacheTimestamp = false;
        $this->cacheTtl = 30;
        $this->cacheKey = 'last_modified';
    }

    /**
     * Assert that the last modified service returns a Carbon class instance.
     *
     * @return void
     */
    public function testReturnsCarbonInstance()
    {
        // Disable timestamp caching.
        $this->cacheTimestamp = false;

        // This will be our fixed last modified timestamp.
        $lastModified = Carbon::now();
        // Give the other test file a previous timestamp.
        $previousTime = $lastModified->subDay(1);

        // Set the file timestamps.
        $this->files['testFileOne']->lastModified($lastModified->timestamp);
        $this->files['testFileTwo']->lastModified($previousTime->timestamp);

        $baseDir = VfsStream::url($this->fileSystem->path('root'));

        $cache = Mockery::mock(Repository::class);

        $instance = new LastModified(
            $cache,
            $baseDir,
            $this->cacheTimestamp,
            $this->cacheTtl,
            $this->cacheKey,
            [
                $baseDir.'/tests',
                $baseDir.'/app',
            ]
        );

        // Call getLastModifiedTime to get the last modified file time.
        $lastModifiedCall = $instance->getLastModifiedTime();

        // Assert we return a Carbon instance.
        $this->assertInstanceOf(Carbon::class, $lastModifiedCall);
    }

    /**
     * Test the last modified service with the caching feature disabled.
     *
     * @return void
     */
    public function testGetsTimestampWithCacheDisabled()
    {
        // Disable timestamp caching.
        $this->cacheTimestamp = false;

        // This will be our fixed last modified timestamp.
        $lastModified = Carbon::now();
        // Give the other test file a previous timestamp.
        $previousTime = $lastModified->subDay(1);

        // Set the file timestamps.
        $this->files['testFileOne']->lastModified($lastModified->timestamp);
        $this->files['testFileTwo']->lastModified($previousTime->timestamp);

        $baseDir = VfsStream::url($this->fileSystem->path('root'));

        $cache = Mockery::mock(Repository::class);

        // The cache should not be used if it is disabled.
        $cache->shouldNotReceive('has');
        $cache->shouldNotReceive('get');
        $cache->shouldNotReceive('put');

        $instance = new LastModified(
            $cache,
            $baseDir,
            $this->cacheTimestamp,
            $this->cacheTtl,
            $this->cacheKey,
            [
                $baseDir.'/tests',
                $baseDir.'/app',
            ]
        );

        // Call getLastModifiedTime to get the last modified file time.
        $lastModifiedCall = $instance->getLastModifiedTime();

        // Assert the timestamp returned is our most "last modified file".
        $this->assertEquals($lastModifiedCall->timestamp, $lastModified->timestamp);
    }

    /**
     * Assert that the service checks the cache for a timestamp if the service
     * is configured to do so.
     *
     * @return void
     */
    public function testChecksCacheForTimestamp()
    {
        // Cache the timestamp.
        $this->cacheTimestamp = true;

        // This will be our fixed last modified timestamp.
        $lastModified = Carbon::now();
        // Give the other test file a previous timestamp.
        $previousTime = $lastModified->subDay(1);

        // Set the file timestamps.
        $this->files['testFileOne']->lastModified($lastModified->timestamp);
        $this->files['testFileTwo']->lastModified($previousTime->timestamp);

        $baseDir = VfsStream::url($this->fileSystem->path('root'));

        $cache = Mockery::mock(Repository::class);

        // Assert that the cache `has` method is called with cache key and
        // it returns false to mock the timestamp not being in cache.
        $cache->shouldReceive('has')->with($this->cacheKey)->andReturn(false);
        // If there is no cached timestamp, get should not be called.
        $cache->shouldNotReceive('get');
        // With caching enabled, we should be able to call `put` to save the
        // timestamp to the cache.
        $cache->shouldReceive('put')->withArgs([
            $this->cacheKey,
            $lastModified->timestamp,
            $this->cacheTtl,
        ]);

        $instance = new LastModified(
            $cache,
            $baseDir,
            $this->cacheTimestamp,
            $this->cacheTtl,
            $this->cacheKey,
            [
                $baseDir.'/tests',
                $baseDir.'/app',
            ]
        );

        // Call getLastModifiedTime to get the last modified file time.
        $lastModifiedCall = $instance->getLastModifiedTime();

        // Assert the timestamp returned is our most "last modified file".
        $this->assertEquals($lastModifiedCall->timestamp, $lastModified->timestamp);
    }

    /**
     * Assert that the service will get the timestamp from the cache if it is
     * present.
     *
     * @return void
     */
    public function testGetsTimestampFromCacheIfPresent()
    {
        // Cache the timestamp.
        $this->cacheTimestamp = true;

        // This will be our fixed last modified timestamp.
        $lastModified = Carbon::now();
        // Give the other test file a previous timestamp.
        $previousTime = $lastModified->subDay(1);

        // Set the file timestamps.
        $this->files['testFileOne']->lastModified($lastModified->timestamp);
        $this->files['testFileTwo']->lastModified($previousTime->timestamp);

        $baseDir = VfsStream::url($this->fileSystem->path('root'));

        $cache = Mockery::mock(Repository::class);

        // Assert that the cache `has` method is called with cache key and
        // it returns true to mock that the timestamp is already present in
        // the cache.
        $cache->shouldReceive('has')->with($this->cacheKey)->andReturn(true);
        // If there is a cached timestamp, `get` should be called and should
        // return our mock latest timestamp.
        $cache->shouldReceive('get')->with($this->cacheKey)->andReturn($lastModified->timestamp);
        // With caching enabled, and a timestamp present in the cache, we shouldn't
        // call put to update the timestamp.
        $cache->shouldNotReceive('put');

        $instance = new LastModified(
            $cache,
            $baseDir,
            $this->cacheTimestamp,
            $this->cacheTtl,
            $this->cacheKey,
            [
                $baseDir.'/tests',
                $baseDir.'/app',
            ]
        );

        // Call getLastModifiedTime to get the last modified file time.
        $lastModifiedCall = $instance->getLastModifiedTime();

        // Assert the timestamp returned is our most "last modified file".
        $this->assertEquals($lastModifiedCall->timestamp, $lastModified->timestamp);
    }

    /**
     * Assert that we do not iterate through the filesystem if we get the timestamp
     * from the cache.
     *
     * @return void
     */
    public function testIgnoresFilesystemIfCacheValuePresent()
    {
        // Cache the timestamp.
        $this->cacheTimestamp = true;

        // This will be our fixed last modified timestamp in the cache.
        $lastModified = Carbon::now();
        // This will be our fixed last modified timestamp for the filesystem.
        // Note that it is after the timestamp we will put in the cache so we
        // can assert we don;t go back to the filesystem if we get the
        // timestamp from the cache.
        $lastModifiedFile = Carbon::now()->addDay(1);
        // Give the other test file a previous timestamp.
        $previousTime = $lastModified->subDay(1);

        // Set the file timestamps.
        $this->files['testFileOne']->lastModified($lastModifiedFile->timestamp);
        $this->files['testFileTwo']->lastModified($previousTime->timestamp);

        $baseDir = VfsStream::url($this->fileSystem->path('root'));

        $cache = Mockery::mock(Repository::class);

        // Assert that the cache `has` method is called with cache key and
        // it returns true to mock that the timestamp is already present in
        // the cache.
        $cache->shouldReceive('has')->with($this->cacheKey)->andReturn(true);
        // If there is a cached timestamp, `get` should be called and should
        // return our mock latest timestamp.
        $cache->shouldReceive('get')->with($this->cacheKey)->andReturn($lastModified->timestamp);
        // With caching enabled, and a timestamp present in the cache, we shouldn't
        // call put to update the timestamp.
        $cache->shouldNotReceive('put');

        $instance = new LastModified(
            $cache,
            $baseDir,
            $this->cacheTimestamp,
            $this->cacheTtl,
            $this->cacheKey,
            [
                $baseDir.'/tests',
                $baseDir.'/app',
            ]
        );

        // Call getLastModifiedTime to get the last modified file time.
        $lastModifiedCall = $instance->getLastModifiedTime();

        // Assert the timestamp returned is our most "last modified file".
        $this->assertEquals($lastModifiedCall->timestamp, $lastModified->timestamp);
    }
}
