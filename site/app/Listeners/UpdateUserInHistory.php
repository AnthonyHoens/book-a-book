<?php

namespace App\Listeners;

use App\Events\UpdateAccountEvent;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserInHistory
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
     * @param  UpdateAccountEvent  $event
     * @return void
     */
    public function handle(UpdateAccountEvent $event)
    {
        $history = new History();

        $history->user_id = $event->user->id;
        $history->title = 'Compte';
        $history->message = 'Vous venez de mettre à jour votre profil.';
        $history->created_at = Carbon::now('Europe/paris');

        $history->save();
    }
}
