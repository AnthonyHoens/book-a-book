<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Book extends Component
{
    public $book;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($book, $description)
    {
        $this->book = $book;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.book');
    }
}
