<?php


namespace App\Http\Livewire\Theme;


use App\Models\Theme;
use Livewire\Component;

class ThemePage extends Component

{
    public array $theme = [
        "theme_id" => "",
        "name" => "",
        "key" => "",
        "meta" => "",
    ];

    public $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Theme"],
    ];

    public bool $updateMode = false;

    protected $listeners = [
        'editListener' => 'edit',
    ];

    public function mount()
    {
        session()->put('active', 'theme');
        session()->put('expanded', false);
    }

    public function render()
    {
        return view('livewire.theme.theme-page')
            ->section('content')
            ->extends('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function save()
    {
        if ($this->updateMode) {
            $this->update();
        } else {
            $this->store();
        }
    }

    public function create()
    {
        $this->updateMode = false;
        $this->reset();
        $this->emit("show_modal_form");
    }


    public function store()
    {
        $this->validate([
            'theme.name' => 'required',
            'theme.key' => 'required',
        ]);
        $this->handleFormRequest(new Theme);
        $this->emit('hideModal');
        $this->emit("refreshDt");
        $this->emit("showToast", ["message" => "Theme Created Successfully", "type" => "success"]);
        $this->reset();
    }


    public function edit($id)
    {
        $this->updateMode = true;
        $theme = Theme::where('theme_id', $id)->first();
        $this->theme = $theme->toArray();
        $this->emit("show_modal_form");
    }


    public function update()
    {
        $this->validate([
            'theme.name' => 'required',
            'theme.key' => 'required',
        ]);
        $save = false;
        if (!empty($this->theme["theme_id"])) {
            $db = Theme::findOrFail($this->theme["theme_id"]);
            if ($db) {
                $save = $this->handleFormRequest($db);
            }
            if ($save) {
                $this->emit("refreshDt");
                $this->emit("showToast", ["message" => "Theme Updated Successfully", "type" => "success"]);
            } else {
                $this->emit("showToast", ["message" => "Theme Failed", "type" => "error"]);
            }
        }
        $this->emit("hideModal");
        $this->reset();
    }


    public function destroy($id)
    {
        $delete = Theme::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Theme Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(Theme $db): bool
    {
        $db->name = $this->theme['name'];
        $db->key = $this->theme['key'];
        return $db->save();
    }
}
