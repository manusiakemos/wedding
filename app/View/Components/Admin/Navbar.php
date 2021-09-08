<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Mobile Navbar
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.navbar');
    }
}