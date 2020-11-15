<?php

namespace App\Listeners;

use App\Events\AddBookToOrderEvent;
use App\Models\Book;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddBookInHistory
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
     * @param  AddBookToOrderEvent  $event
     * @return void
     */
    public function handle(AddBookToOrderEvent $event)
    {
        $history = new History();

        $bookTitle = Book::where('id', '=', $event->book->book_id)->first()->title;

        $history->user_id = $event->user->id;
        $history->title = 'Livres';
        $history->message = 'Ajout du livre "'. $bookTitle .'" à votre commande.';
        $history->created_at = Carbon::now('Europe/paris');

        $history->save();
    }
}
