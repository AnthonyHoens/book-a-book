<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Order extends Component
{
    public $orders;
    public $isdescription;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($orders, $isdescription)
    {
        $this->orders = $orders;
        $this->isdescription = $isdescription;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.order');
    }
}
