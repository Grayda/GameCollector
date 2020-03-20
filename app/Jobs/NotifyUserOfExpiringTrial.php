<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Notifications\TrialEnding;
use App\User;

class NotifyUserOfExpiringTrial implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notifyWhenDaysLeft = 2;
        $users = User::whereDate('trial_ends_at', now()->addDays($notifyWhenDaysLeft));
        $users->each(function($user) use ($notifyWhenDaysLeft) {
          $user->notify((new TrialEnding($notifyWhenDaysLeft)));
        });

    }
}
