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
    'cachettl' => env('LASTMODIFIED_CACHE_TTL', 30),

];
