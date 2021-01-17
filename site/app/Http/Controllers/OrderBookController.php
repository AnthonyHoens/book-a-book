<?php

namespace App\Http\Controllers;

use App\Events\AddBookToOrderEvent;
use App\Events\DeleteBookToOrderEvent;
use App\Events\ModifyOrderEvent;
use App\Events\UpdateBookToOrderEvent;
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

        event(new AddBookToOrderEvent(\request('order_id'), \request()->user(), $book));

        if(\request()->routeIs('book.page.book.store')) {
            return redirect()->route('book.page');
        } else {
            return redirect()->route('home.page');
        }
    }

    public function update()
    {
        $book = OrderBook::where('book_id', '=', \request('book_id'))
            ->where('order_id', '=', \request('order_id'))
            ->first();
        $oldQuantity = $book->quantity;
        $book->quantity = \request('quantity');

        if (\request('quantity') == 0) {
            $book->delete();
        } else {
            $book->save();
        }

        event(new UpdateBookToOrderEvent(\request('order_id'), \request()->user(), $book, $oldQuantity));

        if(\request()->routeIs('order.page.book.update')) {
            return redirect()->route('order.page');
        } else {
            return redirect()->route('home.page');
        }
    }

    public function delete()
    {
        $book = OrderBook::where('book_id', '=', \request('book_id'))
            ->where('order_id', '=', \request('order_id'))
            ->first();

        $book->delete();

        event(new DeleteBookToOrderEvent(\request('order_id'), \request()->user(), $book));

        if(\request()->routeIs('order.page.book.delete')) {
            return redirect()->route('order.page');
        } else {
            return redirect()->route('home.page');
        }
    }
}
