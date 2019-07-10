<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifyDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:dueDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $newStation = new App\Station;
        $newStation->name = "Test";
        $newStation->managedBy = "Administrator";
        $newStation->managedDate = " ";
        $newStation->save();
    }
}
