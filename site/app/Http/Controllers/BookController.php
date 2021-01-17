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
        $books = Book::with('authors', 'sale', 'groups')
            ->get();

        $obligatoryBooks = $books->filter(function ($book) {
            return $book->groups->filter(function ($group) {
                return $group->id == Auth::user()->group->id;
            })->count();
        });

        if (\request('search')) {
            $query = \request('search') ? \request('search') : '';
            $books = Book::query()->where('title', 'like',  '%'. $query . '%')->get();
        }

        $order = Order::where('user_id', '=', Auth::id())
            ->get()
            ->last();

        return view('app.student.books.index', compact('obligatoryBooks', 'order', 'books'));
    }

    public function show(Book $book)
    {
        $books = Book::with('authors', 'publishers', 'sale', 'groups')
            ->get();

        $obligatoryBooks = $books->filter(function ($book) {
            return $book->groups->filter(function ($group) {
                return $group->id == Auth::user()->group->id;
            })->count();
        });

        $order = Order::where('user_id', '=', Auth::id())
            ->get()
            ->last();

        return view('app.student.books.show', compact('book', 'obligatoryBooks', 'order'));
    }
}
