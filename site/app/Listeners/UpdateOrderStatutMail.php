<?php

namespace App\Listeners;

use App\Events\UpdateOrderStatutEvent;
use App\Jobs\SendMailToUserOrderUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderStatutMail
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
     * @param  UpdateOrderStatutEvent  $event
     * @return void
     */
    public function handle(UpdateOrderStatutEvent $event)
    {
        if ($event->order->statut_id == 3) {
            SendMailToUserOrderUpdate::dispatch($event);
        }
    }
}
