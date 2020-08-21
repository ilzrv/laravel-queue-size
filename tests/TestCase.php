<?php

namespace Ilzrv\LaravelQueueSize\Tests;

use Ilzrv\LaravelQueueSize\ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
