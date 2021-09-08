<?php

namespace App\Http\Livewire\Input;

use Laravolt\Indonesia\Facade as Indonesia;
use Livewire\Component;

class Laravolt extends Component
{

    public $provinces;
    public $selectedProvince;

    public $cities;
    public $selectedCity;

    public function mount()
    {
        $this->provinces = Indonesia::allProvinces();
        if($this->selectedProvince){
            $this->cities = Indonesia::findProvince($this->selectedProvince, ['cities']);
        }
    }

    public function updatedSelectedProvince($value)
    {
        $this->cities = Indonesia::findProvince($this->selectedProvince, ['cities']);
        $this->emitTo("user.user-component", "indonesiaListener", "");
        $this->selectedCity = '';
    }

    public function updatedSelectedCity($value)
    {
        $this->emitTo("user.user-component", "indonesiaListener", $value);
    }

    public function render()
    {
        return view('livewire.input.laravolt');
    }
}
