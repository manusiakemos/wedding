<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $size;

    public string $title;

    public function __construct($size="md", $title="")
    {
        $this->size= $size;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.admin.modal');
    }
}
