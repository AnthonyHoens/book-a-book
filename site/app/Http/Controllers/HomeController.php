<?php

namespace App\Http\Controllers;

use App\Events\AddBookToOrder;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Book;
use App\Models\Group;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::with('books.authors', 'books.sale')
            ->where('user_id', '=', Auth::id())
            ->where('validated_at', '=', null)
            ->get();

        $books = Book::with('authors', 'sale')
            ->whereHas('groups', function ($q) {
                $q->where('groups.id', '=', Auth::user()->group->id);
            })
            ->get();

        $order = Order::where('user_id', '=', Auth::id())
            ->get()->last();

        return view('app.student.home.index', compact('orders','books', 'order'));
    }

}
