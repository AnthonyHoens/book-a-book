<?php

namespace App\View\Components;

use Illuminate\View\Component;

class History extends Component
{
    public $histories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($histories)
    {
        $this->histories = $histories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.history');
    }
}
