<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Events\UpdateAccountEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserInHistory
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
     * @param  NewUserEvent $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $history = new History();

        $history->user_id = $event->user->id;
        $history->title = 'Compte';
        $history->message = 'Création du compte.';

        $history->save();
    }
}
