<?php

namespace App\Jobs;

use App\Sample;
use App\Sample_Tests;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sample;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Sample $sample)
    {
        $this->sample = $sample;

        $this->delay();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
