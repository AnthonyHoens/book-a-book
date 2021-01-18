<?php

namespace App\Listeners;

use App\Events\UpdateOrderStatutEvent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateOrderStatutNotification
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
        $notif = new Notification();
        $notif->user_id = $event->order->user->id;
        $notif->title = 'Mise à jour de votre commande';
        $notif->message = 'Le statut de votre commande n° ' . $event->order->order_number . ' est passé à '. Str::lower($event->order->statut->name);
        $notif->save();
    }
}
