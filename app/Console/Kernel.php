<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Schedule comands to run here.
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Autoload artisan console commands.
        $this->load(__DIR__.'/Commands');

        require $this->app->basePath().'/routes/console.php';
    }

    /**
     * Bootstrap the application for artisan commands.
     *
     * @return void
     */
    public function bootstrap()
    {
        // Bootstrap the kernel before we bind the public path so that the
        // environment variables have been loaded.
        parent::bootstrap();

        // Bind the public path to public_html instead of public.
        $this->app->bind('path.public', function () {
            return $this->app->basePath().DIRECTORY_SEPARATOR.config('app.public_path');
        });
    }
}
