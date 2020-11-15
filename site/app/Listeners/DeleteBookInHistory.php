<?php

namespace App\Listeners;

use App\Events\DeleteBookToOrderEvent;
use App\Models\Book;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteBookInHistory
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
     * @param  DeleteBookToOrderEvent  $event
     * @return void
     */
    public function handle(DeleteBookToOrderEvent $event)
    {
        $history = new History();

        $bookTitle = Book::where('id', '=', $event->book->book_id)->first()->title;

        $history->user_id = $event->user->id;
        $history->title = 'Livres';
        $history->message = 'Suppression du livre "'. $bookTitle .'" à votre commande.';

        $history->save();
    }
}
