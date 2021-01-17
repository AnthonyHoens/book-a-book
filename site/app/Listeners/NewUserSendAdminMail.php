<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Jobs\SendNewUserAddedMailToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewUserSendAdminMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        SendNewUserAddedMailToAdmin::dispatch($event);
    }
}
