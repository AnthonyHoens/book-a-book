<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddButton extends Component
{
    public $book;
    public $order;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($book, $order)
    {
        $this->book = $book;
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.add-button');
    }
}
