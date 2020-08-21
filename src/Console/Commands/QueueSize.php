<?php

namespace Ilzrv\LaravelQueueSize\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Queue\QueueManager;

class QueueSize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:size
                            {connection? : The name of the queue connection}
                            {--queue= : The name of the queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Queue Size Command';

    /**
     * The queue manager instance.
     *
     * @var \Illuminate\Queue\QueueManager
     */
    protected $manager;

    /**
     * Create a new command instance.
     *
     * @param QueueManager $manager
     * @return void
     */
    public function __construct(QueueManager $manager)
    {
        parent::__construct();

        $this->manager = $manager;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $connection = $this->argument('connection')
                        ?: $this->laravel['config']['queue.default'];

        $size = $this->manager->connection($connection)->size(
            $this->getQueue($connection)
        );

        $this->line($size);
    }

    /**
     * Get the queue name for the worker.
     *
     * @param  string  $connection
     * @return string
     */
    protected function getQueue($connection)
    {
        return $this->option('queue') ?: $this->laravel['config']->get(
            "queue.connections.{$connection}.queue", 'default'
        );
    }
}
