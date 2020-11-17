<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfilUser extends Component
{
    public $user;
    public $groups;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $groups)
    {
        $this->user = $user;
        $this->groups = $groups;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profil-user');
    }
}
