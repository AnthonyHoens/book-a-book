<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Order extends Component
{
    public $order;
    public $isdescription;
    public $isimage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order, $isdescription, $isimage)
    {
        $this->order = $order;
        $this->isdescription = $isdescription;
        $this->isimage = $isimage;
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
