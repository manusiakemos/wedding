<?php


namespace App\Http\Livewire\Invitation;

use Livewire\Component;
use App\Models\Invitation;

class InvitationPage extends Component

{
    public array $invitation = [
        "invitation_id" => "",
        "user_id" => "",
        "theme_id" => "",
        "invitation_url" => "",
    ];

    public $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Invitation"],
    ];

    public bool $updateMode = false;

    protected $listeners = [
        'editListener' => 'edit',
    ];

    public function mount()
    {
        session()->put('active', 'invitation');
        session()->put('expanded', false);
    }

    public function render()
    {
        return view('livewire.invitation.invitation-page')
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
        $this->emit("setSummernoteValue");
    }


    public function store()
    {
        $this->validate([
            'invitation.theme_id' => 'required',
            'invitation.invitation_url' => 'required',
        ]);
        $this->handleFormRequest(new Invitation);
        $this->emit('hideModal');
        $this->emit("refreshDt");
        $this->emit("showToast", ["message" => "Invitations Created Successfully", "type" => "success"]);
        $this->reset();
    }


    public function edit($id)
    {
        $this->updateMode = true;
        $invitation = Invitation::where('invitation_id', $id)->first();
        $this->invitation = $invitation->toArray();
        $this->emit("show_modal_form");
        $this->emit("setSummernoteValue");
    }


    public function update()
    {
        $this->validate([
            'invitation.theme_id' => 'required',
            'invitation.invitation_url' => 'required',
        ]);
        $save = false;
        if (!empty($this->invitation["invitation_id"])) {
            $db = Invitation::findOrFail($this->invitation["invitation_id"]);
            if ($db) {
                $save = $this->handleFormRequest($db);
            }
            if ($save) {
                $this->emit("refreshDt");
                $this->emit("showToast", ["message" => "Invitations Updated Successfully", "type" => "success"]);
            } else {
                $this->emit("showToast", ["message" => "Invitations Failed", "type" => "error"]);
            }
        }
        $this->emit("hideModal");
        $this->reset();
    }


    public function destroy($id)
    {
        $delete = Invitation::destroy($id);
        if ($delete) {
            $this->emit("showToast", ["message" => "Invitations Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->emit("refreshDt");
        $this->reset();
    }

    private function handleFormRequest(Invitation $db): bool
    {
        $meta = [
        "contract" => [
            "date" => "",
            "start" => "",
            "finish" => "",
            "place" => "",
            "city" => "",
            "address" => "",
        ],
        "reception" => [
            "date" => "",
            "city" => "",
            "start" => "",
            "finish" => "",
            "place" => "",
            "address" => "",
        ],
        "brides" => [
            "male" => [
                "photo" => "",
                "nickname" => "",
                "fullname" => "",
                "parent_name" => "",
                "about" => "",
                "father" => "",
                "also_invite" => [
                    "someone"
                ]
            ],
            "female" => [
                "photo" => "",
                "nickname" => "",
                "fullname" => "",
                "parent_name" => "",
                "about" => "",
                "also_invite" => [
                    "someone"
                ]
            ],
        ]
    ];
        $db->theme_id = $this->invitation['theme_id'];
        $db->invitation_url = $this->invitation['invitation_url'];
        $db->current_step = 1;
        $db->invitation_meta = json_encode($meta);
        if($this->updateMode == false){
            $db->user_id = auth()->id();
        }
        $db->save();

        if($this->updateMode ==  false){
            redirect()->route('invitation.detail', $db->invitation_id);
        }
        return true;
    }
}
