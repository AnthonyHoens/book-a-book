<?php

namespace App\Http\Controllers;

use App\Events\AddBookToOrder;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::with('books.authors', 'books.sale')
            ->where('user_id', '=', Auth::id())
            ->get();

        $books = Book::with('authors')
            ->with('sale')
            ->get();

        $order = Order::where('user_id', '=', Auth::id())
            ->get();

        $order = $order->last();

        return view('app.student.home.index', compact('orders','books', 'order'));
    }

}
