<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\Publisher;
use App\Models\Sale;
use App\Traits\CreatingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBookController extends Controller
{
    use CreatingImage;

    public function index() {
        $books = Book::with('authors', 'sale')->get();

        return view('app.admin.book.index', compact('books'));
    }

    public function create() {
        $books = Book::with('authors', 'sale')
            ->paginate(10);

        return view('app.admin.book.create', compact('books'));
    }

    public function store(StoreBookRequest $request) {
        $validatedData = $request->validated();

        $author = Author::all()->filter(function ($author) {
           return $author->name == \request('book_authors');
        })->first();

        $book = new Book();
        $book->title = $validatedData['book_title'];
        $book->slug = Str::slug($validatedData['book_title']);
        if ($request->hasFile('book_img')) {
            $this->saveBook($request, $book->slug);

            $book->cover_page = $book->slug .'.'. $request->file('book_img')->extension();
        }
        $book->isbn = $validatedData['book_isbn'];
        $book->edit_detail = $validatedData['book_edit_detail'];
        $book->stock = $validatedData['book_stock'];
        $book->save();

        $sale = new Sale();
        $sale->book_id = $book->id;
        $sale->starting_price = $validatedData['book_starting_price'];
        $sale->student_price = $validatedData['book_student_price'];
        $sale->save();

        $publisher = new Publisher();
        $publisher->book_id = $book->id;
        $publisher->name = $validatedData['book_publishers'];
        $publisher->save();

        if ($author) {
            $bookAuthor = new BookAuthor();
            $bookAuthor->book_id = $book->id;
            $bookAuthor->author_id = $author->id;
            $bookAuthor->save();
        } else {
            $newAuthor = new Author();
            $newAuthor->name = $validatedData['book_authors'];
            $newAuthor->save();

            $bookAuthor = new BookAuthor();
            $bookAuthor->book_id = $book->id;
            $bookAuthor->author_id = $newAuthor->id;
            $bookAuthor->save();
        }


        return redirect()->route('admin.book.page');
    }

    public function delete() {
        $book = Book::find(\request('book_id'));
        $book->delete();

        return redirect()->route('admin.book.page');
    }
}
