<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Set up custom Monolog configuration
|--------------------------------------------------------------------------
| We can set up a custom configured Monolog to the IoC to fine tune the way
| the application handles logging.
|
*/

$app->configureMonologUsing(function ($monolog) use ($app) {
    $bubble = false;
    
    $debugStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_debug.log',
        \Monolog\Logger::DEBUG,
        $bubble
    );
    $infoStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_info.log',
        \Monolog\Logger::INFO,
        $bubble
    );
    $noticeStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_notice.log',
        \Monolog\Logger::NOTICE,
        $bubble
    );
    $warningStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_warning.log',
        \Monolog\Logger::WARNING,
        $bubble
    );
    $errorStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_error.log',
        \Monolog\Logger::ERROR,
        $bubble
    );
    $criticalStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_critical.log',
        \Monolog\Logger::CRITICAL,
        $bubble
    );
    $alertStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_alert.log',
        \Monolog\Logger::ALERT,
        $bubble
    );
    $emergencyStreamHandler = new \Monolog\Handler\StreamHandler(
        $app->storagePath().'/logs/laravel_emergency.log',
        \Monolog\Logger::EMERGENCY,
        $bubble
    );
    
    $monolog->pushHandler($debugStreamHandler);
    $monolog->pushHandler($infoStreamHandler);
    $monolog->pushHandler($noticeStreamHandler);
    $monolog->pushHandler($warningStreamHandler);
    $monolog->pushHandler($errorStreamHandler);
    $monolog->pushHandler($criticalStreamHandler);
    $monolog->pushHandler($alertStreamHandler);
    $monolog->pushHandler($emergencyStreamHandler);
});

$app->make('log')->useDailyFiles($app->storagePath().'/logs/laravel_daily.log');

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
