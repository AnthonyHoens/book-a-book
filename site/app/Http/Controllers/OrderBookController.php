<?php

namespace App\Http\Controllers;

use App\Events\ModifyOrderEvent;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderBookController extends Controller
{
    public function store()
    {
        $book = new OrderBook();

        $book->order_id = \request('order_id');
        $book->book_id = \request('book_id');
        $book->quantity = \request('quantity');

        $book->save();

        event(new ModifyOrderEvent(\request('order_id')));

        return redirect()->route('home.page');
    }

    public function update()
    {
        $book = OrderBook::where('book_id', '=', \request('book_id'))
            ->where('order_id', '=', \request('order_id'))
            ->first();

        $book->quantity = \request('quantity');
        $book->save();

        event(new ModifyOrderEvent(\request('order_id')));

        return redirect()->route('home.page');
    }

    public function delete()
    {
        $book = OrderBook::where('book_id', '=', \request('book_id'))
            ->where('order_id', '=', \request('order_id'))
            ->first();

        $book->delete();

        event(new ModifyOrderEvent(\request('order_id')));

        return redirect()->route('home.page');
    }
}
