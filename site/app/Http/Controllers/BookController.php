<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')
            ->with('sale')
            ->get();

        return view('app.student.books.index', compact('books'));
    }
}
