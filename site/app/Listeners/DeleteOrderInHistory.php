<?php

namespace App\Listeners;

use App\Events\DeleteOrderEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteOrderInHistory
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
     * @param  DeleteOrderEvent  $event
     * @return void
     */
    public function handle(DeleteOrderEvent $event)
    {
        $history = new History();

        $history->user_id = $event->order->user->id;
        $history->title = 'Commande n° ' . $event->order->order_number;
        $history->message = 'Suppression de votre commande.';

        $history->save();
    }
}
