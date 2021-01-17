<?php

namespace App\Listeners;

use App\Events\UpdateOrderEvent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WaitingPaymentNotification
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
        Notification::create([
            'user_id' => $event->order->user->id,
            'title' => 'Paiement de commande',
            'message' => 'Votre commande n° '. $event->order->order_number .' est en attente de paiement.',
        ]);
    }
}
