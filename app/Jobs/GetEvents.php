<?php

namespace App\Jobs;


use App\Services\GetEventsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetEvents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $date;
    protected int $limit;
    /**
     * Create a new job instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//
//    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        GetEventsService::getEvents();
    }
}
