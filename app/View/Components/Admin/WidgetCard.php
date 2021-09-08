<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class WidgetCard extends Component
{
    public string $title;
    public string $number;


    public function __construct($title, $number)
    {
        $this->title = $title;
        $this->number = number_format($number,0, ",", ".");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.widget-card');
    }
}
