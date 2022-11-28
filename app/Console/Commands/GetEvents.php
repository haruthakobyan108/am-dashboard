<?php

namespace App\Console\Commands;

use App\Jobs\GetEvents as GetEventsJob;
use Illuminate\Console\Command;

class GetEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getEvents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get friendship events from MySql DB ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return GetEventsJob::dispatch();
    }
}
