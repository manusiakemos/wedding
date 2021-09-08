<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $method;

    public string $key;

    public string $value;

    public string $options; //json string

    public string $placeholder;

    public bool $select2;

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
        $this->options = collect($this->{$method}())->toJson();

        if($this->select2){
            return view('components.input.select2');
        }
        return view('components.input.radio');
    }

    //your options query below

    private function role()
    {
        $this->key = "key";
        $this->value = "value";
        $this->placeholder = "Please Select A Role ...";
        return [
            [
                "key" => "admin",
                "value" => "Admin"
            ],
            [
                "key" => "super-admin",
                "value" => "Super Admin"
            ]
        ];
    }
}
