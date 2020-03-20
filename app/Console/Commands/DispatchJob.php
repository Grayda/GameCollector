<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DispatchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:dispatch {job} {--s|sync : Specifies that the job should be run synchronously}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch job';

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
         $class = '\\App\\Jobs\\' . $this->argument('job');
         echo 'Dispatching ' . $this->argument('job');
         if($this->option('sync')) {
           return dispatch_now(new $class());
         } else {
           return dispatch(new $class());
         }
     }
}
