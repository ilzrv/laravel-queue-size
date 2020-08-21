<?php

namespace Ilzrv\LaravelQueueSize\Tests;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Queue;

class QueueSizeTest extends TestCase
{
    /** @test */
    public function the_command_is_correct()
    {
        $this
            ->artisan('queue:size')
            ->expectsOutput(0);
    }

    /** @test */
    public function the_command_correct_counts()
    {
        Queue::fake();

        dispatch(new TestJob1);
        dispatch(new TestJob1);

        $this
            ->artisan('queue:size')
            ->expectsOutput(2);
    }

    /** @test */
    public function the_command_counts_its_queue()
    {
        Queue::fake();

        dispatch(new TestJob1);
        dispatch(new TestJob2);

        $this
            ->artisan('queue:size', [
                '--queue' => 'another-queue'
            ])
            ->expectsOutput(1);
    }
}

class TestJob1 implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        $this->onQueue('default');
    }
}

class TestJob2 implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        $this->onQueue('another-queue');
    }
}
