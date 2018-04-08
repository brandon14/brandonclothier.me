<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cache Last Modified Timestamp
    |--------------------------------------------------------------------------
    |
    | This option controls whether to cache the last modified timestamp.
    |
    */

    'cache' => env('LASTMODIFIED_CACHE_TIMESTAMP', true),

    /*
    |--------------------------------------------------------------------------
    | Cache TTL
    |--------------------------------------------------------------------------
    |
    | This option controls the time to cache the timestamp for.
    |
    */

    'cache_ttl' => env('LASTMODIFIED_CACHE_TTL', 30),

    /*
    |--------------------------------------------------------------------------
    | Cache Key
    |--------------------------------------------------------------------------
    |
    | This option controls the cache key value.
    |
    */

    'cache_key' => env('LASTMODIFIED_CACHE_KEY', 'last_modified'),

    /*
    |--------------------------------------------------------------------------
    | Included Directories
    |--------------------------------------------------------------------------
    |
    | Array of directories (absolute paths) that the LastModifed service will
    | iterate through in addition to checking all files in the application root
    | directory (as defined by the `path.base` property).
    |
    */

    'included_directories' =>
        // Check for a string .env config value.
        env('LASTMODIFIED_INCLUDED_DIRECTORIES', false) && is_string(env('LASTMODIFIED_INCLUDED_DIRECTORIES', false))
            // Check for a comma delimited string.
            ? strpos(env('LASTMODIFIED_INCLUDED_DIRECTORIES', false), ',') !== false
                // Map the array to fully resolve paths.
                ? array_map(function ($directory) {
                    // Return absolute URLs as they are.
                    if (substr($directory, 0, 1) === '/') {
                        return realpath($directory);
                    }
                    // Resolve relative URLs at the base application path.
                    return realpath(app('path.base').DIRECTORY_SEPARATOR.$directory);
                }, array_filter(explode(',', env('LASTMODIFIED_INCLUDED_DIRECTORIES', false))))
                // If no comma separated string, its a single path, so create an array out of it with
                // the fully resolved path.
                : [
                    substr(env('LASTMODIFIED_INCLUDED_DIRECTORIES', false), 0, 1) === '/'
                        ? realpath(env('LASTMODIFIED_INCLUDED_DIRECTORIES', false))
                        : realpath(app('path.base').DIRECTORY_SEPARATOR.env('LASTMODIFIED_INCLUDED_DIRECTORIES', false)),
                ]
            // Fallback to the default list of paths.
            : [
                $app->make('path'),
                $app->make('path.config'),
                $app->make('path.public'),
                $app->make('path.database'),
                $app->make('path.resources'),
                $app->make('path.bootstrap'),
                $app->make('path.base').DIRECTORY_SEPARATOR.'tests',
            ],
];
