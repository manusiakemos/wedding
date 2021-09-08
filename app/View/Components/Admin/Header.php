<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Component Header
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.admin.header');
    }
}
