<?php

namespace Ilzrv\LaravelQueueSize;

use Ilzrv\LaravelQueueSize\Console\Commands\QueueSize;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                QueueSize::class,
            ]);
        }
    }
}
