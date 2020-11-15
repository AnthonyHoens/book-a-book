<?php

namespace App\Listeners;

use App\Events\AddBookToOrderEvent;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePriceInOrder
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
    public function handle($event)
    {
        $orderBooks = OrderBook::with('books.sale')
            ->where('order_id', '=', $event->orderID)
            ->get();

        $total = 0;

        foreach ($orderBooks as $book) {
            $price = $book->books->sale->student_price;
            $total += $price * $book->quantity;
        }

        $order = Order::where('id', '=', $event->orderID)
            ->first();
        $order->total_price = $total;
        $order->save();
    }
}
