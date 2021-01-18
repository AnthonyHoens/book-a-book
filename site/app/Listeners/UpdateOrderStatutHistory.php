<?php

namespace App\Listeners;

use App\Events\UpdateOrderStatutEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UpdateOrderStatutHistory
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
        $history = new History();
        $history->user_id = Auth::user()->id;
        $history->title = 'Mise à jour de la commande de ' . $event->order->user->first_name . ' ' . $event->order->user->name;
        $history->message = 'Vous avez changé le statut de la commande de ' . $event->order->user->first_name . ' ' . $event->order->user->name . ' à '. Str::lower($event->order->statut->name);

        $history->save();
    }
}
