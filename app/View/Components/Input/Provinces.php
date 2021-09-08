<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;
use Indonesia;


class Provinces extends Component
{
    public $provinces;

    public function __construct()
    {
        $this->provinces = Indonesia::allProvinces()->toJson();
    }

    public function render()
    {
        return view('components.input.provinces');
    }
}
