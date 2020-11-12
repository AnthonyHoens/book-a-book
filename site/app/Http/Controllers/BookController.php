<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')
            ->with('sale')
            ->get();

        $order = Order::where('user_id', '=', Auth::id())
            ->get();

        $order = $order->last();

        return view('app.student.books.index', compact('books', 'order'));
    }
}
