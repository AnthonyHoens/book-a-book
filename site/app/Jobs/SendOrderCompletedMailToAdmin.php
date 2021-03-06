<?php

namespace App\Jobs;

use App\Mail\OrderComplete;
use App\Mail\UserAddedForAdmin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderCompletedMailToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        $adminUsers = $users->filter(function ($user) {
            return $user->isAdmin;
        });

        foreach ($adminUsers as $user) {
            Mail::to($user->email)
                ->send(new OrderComplete($this->event->order));
        }
    }
}
