<?php

namespace App\Listeners;

use App\Events\UpdateBookToOrderEvent;
use App\Models\Book;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateBookInHistory
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
     * @param  UpdateBookToOrderEvent  $event
     * @return void
     */
    public function handle(UpdateBookToOrderEvent $event)
    {
        $history = new History();

        $bookTitle = Book::where('id', '=', $event->book->book_id)->first()->title;

        $history->user_id = $event->user->id;
        $history->title = 'Livres';
        $history->message = 'Mise à jour de la quantité du livre "'. $bookTitle .'" de '. $event->oldQuantity .' exemplaires à '. $event->book->quantity .' exemplaires à votre commande.';
        $history->created_at = Carbon::now('Europe/paris');

        $history->save();
    }
}
