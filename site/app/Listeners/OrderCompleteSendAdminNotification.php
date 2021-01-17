<?php

namespace App\Listeners;

use App\Events\UpdateOrderEvent;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCompleteSendAdminNotification
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
        $users = User::all()->filter(function ($user) {
           return $user->isAdmin;
        });
        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Commande de ' . $event->order->user->first_name . ' ' . $event->order->user->name,
                'message' => $event->order->user->first_name . ' ' . $event->order->user->name. ' vient de finaliser sa commande.',
            ]);
        }
    }
}
