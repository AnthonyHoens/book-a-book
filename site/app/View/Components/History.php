<?php

namespace App\View\Components;

use Illuminate\View\Component;

class History extends Component
{
    public $histories;
    public $userName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($histories, $userName)
    {
        $this->histories = $histories;
        $this->userName = $userName;
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
