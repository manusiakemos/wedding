<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePage extends Component
{
    public array $user = [];
    public array $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Profile"],
    ];

    public string $password = "";
    public string $password_confirmation = "";

    use WithFileUploads;

    public $image;

    public array $tabHeaders = [
        ['key' => 'edit', 'title' => 'Edit Profile', "icon" => "<i class='fi-rr-pencil'></i>"],
        ['key' => 'avatar', 'title' => 'Change Avatar', "icon" => "<i class='fi-rr-user'></i>"],
        ['key' => 'password', 'title' => 'Change Password', "icon" => "<i class=\"fi-rr-key\"></i>"],
    ];


    public function mount()
    {
        $this->user = auth()->user()->toArray();
        session()->put("active", "profile");
        session()->put("expanded", "admin");
    }

    public function render()
    {
        return view('livewire.admin.profile-page')
            ->section('content')
            ->extends('layouts.admin');
    }

    public function hydrate()
    {
        $this->resetValidation();
        $this->resetErrorBag();
    }


    public function updateProfile()
    {
        $this->validate([
            "user.name" => "required",
            "user.username" => [
                "required",
                Rule::unique('users', 'username')->ignore($this->user['id']),
            ],
            "user.email" => [
                "required",
                Rule::unique('users', 'email')->ignore($this->user['id']),
            ]
        ]);
        $user = User::find($this->user['user_id']);
        $user->name = $this->user['name'];
        $user->username = $this->user['username'];
        $user->email = $this->user['email'];
        $user->save();
        $this->emit("showToast", ["message" => "Profile has been updated", "type" => "success"]);
    }

    public function updatePassword()
    {
        $this->validate([
            "password" => "required|confirmed"
        ]);
        $user = User::find($this->user['user_id']);
        $user->password = Hash::make($this->password);
        $user->save();
        $this->reset(['password', 'password_confirmation']);
        $this->emit("showToast", ["message" => "Profile has been changed", "type" => "success"]);
    }

    public function updateAvatar()
    {
        $this->validate([
            'image' => ['required', 'image', 'max:1000'],
        ]);
        $user = User::find($this->user['user_id']);
        $user->addMedia($this->image->getRealPath())->toMediaCollection('avatar');
        $this->reset(["image"]);
        $this->emit("showToast", ["message" => "Avatar has been changed", "type" => "success", "reload"=>true]);

    }
}
