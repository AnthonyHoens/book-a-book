<?php

namespace App\Listeners;

use App\Events\AddBookToOrder;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRowToHistory
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
     * @param  AddBookToOrder  $event
     * @return void
     */
    public function handle(AddBookToOrder $event)
    {
        $history = new History();

        $history->user_id = $event->user;
        $history->title = 'Livres';
        $history->message = 'Ajout du livre dans la commande';

        $history->save();
    }
}
