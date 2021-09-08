<?php

namespace App\View\Components\Input;

use App\Models\Theme;
use Illuminate\View\Component;

class Select extends Component
{
    public string $method;

    public string $value;

    public string $text;

    public $options;

    public string $placeholder;

    public bool $select2;

    public array $initialValue;

    public function __construct($method, $select2)
    {
        $this->method = $method;
        $this->select2 = $select2;
    }


    public function render()
    {
        $method = $this->method;
        if (!method_exists($this, $method)) {
            return responseJson("case method not exists");
        }
        $x = collect($this->{$method}());

        if($this->select2){
            $this->options = $x->prepend($this->initialValue)->toJson();
            return view('components.input.select2');
        }else{
            $this->options = $x->prepend($this->initialValue)->toArray();
            return view('components.input.select');
        }
    }

    //your options query below

    private function role()
    {
        $this->value = "value";
        $this->text = "text";
        $this->initialValue = [
            "value" => "",
            "text" => "Select A Role"
        ];
        $this->placeholder = "Please Select A Role ...";
        return [
            [
                "value" => "admin",
                "text" => "Admin"
            ],
            [
                "value" => "super-admin",
                "text" => "Super Admin"
            ]
        ];
    }

    private function theme()
    {
        $this->value = "theme_id";
        $this->text = "name";
        $this->placeholder = "Please Select A Theme ...";
        $this->initialValue = [
            "theme_id" => "",
            "name" => "Select A Theme",
            "key" => ""
        ];
        return Theme::select(['theme_id', 'name', 'key'])->get();
    }
}
