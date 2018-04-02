<?php

use Monolog\Handler\StreamHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver'   => 'stack',
            'channels' =>
                // Whew I know it is ugly Jesus christ, but we let the user specify the
                // stack of drivers in a comma separated list, or if its a single driver
                // we put that into an array.
                env('LOG_STACK_DRIVERS', false) && is_string(env('LOG_STACK_DRIVERS', false))
                    ? strpos(env('LOG_STACK_DRIVERS', false), ',') !== false
                        // If it's a comma separated string, explode and remove empty
                        // values.
                        ? array_filter(explode(',', env('LOG_STACK_DRIVERS')))
                        // Otherwise fall back to the single driver.
                        : [env('LOG_STACK_DRIVERS', 'single')]
                    // Either no or null drivers specified or some non-string driver, fallback
                    // to single driver.
                    : ['single'],
        ],

        'single' => [
            'driver' => 'single',
            'path'   => storage_path('logs/laravel.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path'  => storage_path('logs/laravel.log'),
            'level' => env('LOG_DAILY_LEVEL', 'debug'),
            'days'  => 7,
        ],

        'slack' => [
            'driver'   => 'slack',
            'url'      => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji'    => env('LOG_SLACK_EMOJI', ':boom:'),
            'level'    => env('LOG_SLACK_LEVEL', 'debug'),
        ],

        'stderr' => [
            'driver'  => 'monolog',
            'handler' => StreamHandler::class,
            'with'    => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level'  => env('LOG_SYSLOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level'  => env('LOG_ERRORLOG_LEVEL', 'debug'),
        ],
    ],

];
