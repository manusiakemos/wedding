<?php


namespace App\Http\Livewire\User;


use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;

class UserPage extends Component

{
    public array $user = [
        "user_id" => "",
        "village_id" => "",
        "name" => "",
        "username" => "",
        "email" => "",
        "role" => "admin",
        "avatar" => "",
        "about" => "",
    ];

    public $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "User Management"],
    ];

    public bool $updateMode = false;

    protected $listeners = [
        'editListener' => 'edit',
    ];

    public function mount()
    {
        session()->put('active', 'user');
        session()->put('expanded', 'admin');
    }

    public function render()
    {
        return view('livewire.user.user-page')
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
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email' => 'required|email',
        ]);
        $this->handleFormRequest(new User);
        $this->emit('hide_modal_form');
        $this->emit("refreshDt");
        $this->emit("showToast", ["message" => "Users Created Successfully", "type" => "success"]);
        $this->reset();
    }


    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('user_id', $id)->first();
        $this->user = $user->toArray();
        $this->emit("show_modal_form");
    }


    public function update()
    {
        $this->validate([
            'user.name' => 'required',
            'user.username' => 'required',
            'user.role' => 'required',
            'user.email' => 'required|email',
        ]);

        if ($this->user["user_id"]) {
            $db = User::findOrFail($this->user["user_id"]);
            if ($db) {
                $save = $this->handleFormRequest($db);
            }
            if ($save) {
                $this->emit("refreshDt");
                $this->emit("showToast", ["message" => "Users Updated Successfully", "type" => "success"]);
            } else {
                $this->emit("showToast", ["message" => "Users Failed", "type" => "error"]);
            }
        }
        $this->emit("hide_modal_form");
        $this->reset();
    }


    public function destroy($id)
    {
        $delete = User::destroy($id);
        if ($delete) {
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Users Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->reset();
    }

    private function handleFormRequest(User $db): bool
    {
        $db->username = $this->user['username'];
        $db->email = $this->user['email'];
        $db->name = $this->user['name'];
        $db->role = $this->user['role'];
        $db->about = $this->user['about'];
        if (!$this->updateMode) {
            $db->password = bcrypt("password");
            $db->api_token = Str::random(100);
        }
        return $db->save();
    }
}
