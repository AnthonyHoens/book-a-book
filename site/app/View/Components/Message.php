<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    public $message;
    public $userName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $userName)
    {
        $this->message = $message;
        $this->userName = $userName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.message');
    }
}
