<?php

namespace App\Listeners;

use App\Events\UpdateOrderEvent;
use App\Jobs\SendOrderCompletedMailToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCompleteSendAdminMail
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
     * @param  UpdateOrderEvent  $event
     * @return void
     */
    public function handle(UpdateOrderEvent $event)
    {
        SendOrderCompletedMailToAdmin::dispatch($event);
    }
}
