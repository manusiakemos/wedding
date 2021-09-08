<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Navigation extends Component
{
    public string $selector;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selector)
    {
        $this->selector = $selector;
    }

    public function render()
    {
        return view('components.admin.navigation');
    }
}
