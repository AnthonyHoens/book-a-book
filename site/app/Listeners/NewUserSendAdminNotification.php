<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserSendAdminNotification
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
        $users = User::all()->filter(function ($user) {
            return $user->isAdmin;
        });
        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Création d\'un compte',
                'message' => $event->user->first_name . ' ' . $event->user->name . ' vient de créer son compte.',
            ]);
        }
    }
}
