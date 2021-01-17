<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBar extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    public $sortField = 'title';
    public $rq;

    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != '') {
            $queryBooks = Book::query()
                ->where($this->sortField, 'LIKE',  '%' . $this->search . '%')
                ->get();
        } else {
            $queryBooks = 0;
        }
        $order = Order::where('user_id', '=', Auth::id())->get()->last();

        return view('livewire.search-bar', [
            'title'=> $this->search,
            'queryBooks' => $queryBooks,
            'order' => $order,
        ]);
    }
}
