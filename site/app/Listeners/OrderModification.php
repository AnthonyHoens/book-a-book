<?php

namespace App\Listeners;

use App\Events\ModifyOrderEvent;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderModification
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
     * @param  ModifyOrderEvent  $event
     * @return void
     */
    public function handle(ModifyOrderEvent $event)
    {
        $orderBooks = OrderBook::with('books.sale')
            ->where('order_id', '=', $event->orderID)
            ->get();

        $order = Order::where('id', '=', $event->orderID)
            ->first();

        $total = 0;

        foreach ($orderBooks as $book) {
            $price = $book->books->sale->student_price;

            $total += $price * $book->quantity;
        }

        $order->total_price = $total;
        $order->save();
    }
}
