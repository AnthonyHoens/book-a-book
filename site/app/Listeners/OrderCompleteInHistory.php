<?php

namespace App\Listeners;

use App\Events\UpdateOrderEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCompleteInHistory
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
        $history = new History();

        $history->user_id = $event->order->user->id;
        $history->title = 'Commande n° ' . $event->order->order_number;
        $history->message = 'Vous venez de finaliser votre commande.';

        $history->save();
    }
}
