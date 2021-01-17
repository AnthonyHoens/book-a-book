<?php

namespace App\Listeners;

use App\Events\CreateOrderEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateOrderInHistory
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
     * @param  CreateOrderEvent  $event
     * @return void
     */
    public function handle(CreateOrderEvent $event)
    {
        $history = new History();

        $history->user_id = $event->order->user->id;
        $history->title = 'Commande n° ' . $event->order->order_number;
        $history->message = 'Création d\'une nouvelle commande.';

        $history->save();
    }
}
