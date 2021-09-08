<?php

namespace App\Http\Livewire\Invitation;

use App\Models\Invitation;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public array $invitation = [];

    public array $breadcrumbs = [];

    public bool $updateMode = true;

    public string $title = "";

    public $male_image;
    public $female_image;
    public $cover_image;

    public $tabHeaders = [
        ['key' => "tab_1", 'title' => 'Invitation', 'disabled' => false, 'icon' => '1'],
        ['key' => "tab_2", 'title' => 'Contract', 'disabled' => true, 'icon' => '2'],
        ['key' => "tab_3", 'title' => 'Reception', 'disabled' => true, 'icon' => '3'],
        ['key' => "tab_4", 'title' => 'Male Bride', 'disabled' => true, 'icon' => '4'],
        ['key' => "tab_5", 'title' => 'Female Bride', 'disabled' => true, 'icon' => '5'],
        ['key' => "tab_6", 'title' => 'Photo', 'disabled' => true, 'icon' => '6'],
    ];

    public $meta = [
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

                ]
            ],
            "female" => [
                "photo" => "",
                "nickname" => "",
                "fullname" => "",
                "parent_name" => "",
                "about" => "",
                "also_invite" => [

                ]
            ],
        ]
    ];

    public function mount($invitation_id = null)
    {
        if ($invitation_id) {
            $this->invitation = Invitation::find($invitation_id)->toArray();
            $this->updateMode = true;
            $title = "Edit";
            $this->title = $title;
            $meta = json_decode($this->invitation['invitation_meta'], true);
            $this->invitation['invitation_meta'] = $meta;
        } else {
            $title = "Create";
            $this->title = $title;
            if (request()->session()->has('temporary_invitation')) {
                $this->invitation = session('temporary_invitation');
            } else {
                $meta = $this->meta;

                $this->invitation = [
                    "invitation_id" => "",
                    "theme_id" => "",
                    "invitation_url" => "",
                    "invitation_google_map" => "",
                    "timezone" => "UTC+8",
                    "current_step" => 1,
                    "cover_photo" => "",
                    "invitation_meta" => $meta,
                ];
            }
        }
        $this->breadcrumbs = [
            ["link" => "#", "title" => "Admin"],
            ["link" => route('invitation'), "title" => "Invitations"],
            ["link" => "#", "title" => $title],
        ];
    }

    public function render()
    {
        return view('livewire.invitation.detail')
            ->section('content')
            ->extends('layouts.admin');
    }

    public function updatedInvitation($newValue)
    {
        request()->session()->put('temporary_invitation', $this->invitation);
    }

    public function goToStep(int $currentStep)
    {

        $this->invitation['current_step'] = $currentStep;

        if ($this->updateMode) {
            $db = Invitation::find($this->invitation['invitation_id']);
        } else {
            $db = new Invitation;
        }

        $this->saveData($currentStep, $db);

        $bags = $this->tabHeaders;
        $this->tabHeaders = [];
        foreach ($bags as $tabHeader) {
            $tabHeaderStep = intval(explode("_", $tabHeader['key'])[1]);
            if ($tabHeaderStep <= $currentStep) {
                $x = false;
            } else {
                $x = true;
            }
            $this->tabHeaders[] = ['key' => "tab_$tabHeaderStep", 'title' => $tabHeader['title'], 'disabled' => $x];
        }

        $this->dispatchBrowserEvent('nextStep', ['currentStep' => $this->invitation['current_step']]);
    }

    public function add($type = "male")
    {
        if (!isset($this->invitation['invitation_meta']['brides'][$type]['also_invite'])) {
            $this->invitation['invitation_meta']['brides'][$type]['also_invite'] = [];
        }
        $array = $this->invitation['invitation_meta']['brides'][$type]['also_invite'];
        $collection = collect($array);
        $collection->push("");
        $this->invitation['invitation_meta']['brides'][$type]['also_invite'] = $collection->toArray();
    }

    public function remove($type = "male", $index)
    {
        if (!isset($this->invitation['invitation_meta']['brides'][$type]['also_invite'])) {
            $this->invitation['invitation_meta']['brides'][$type]['also_invite'] = [];
        }
        $array = $this->invitation['invitation_meta']['brides'][$type]['also_invite'];
        $collection = collect($array);
        $collection->splice($index, 1);
        $this->invitation['invitation_meta']['brides'][$type]['also_invite'] = $collection->toArray();
    }

    public function saveData(int $currentStep, Invitation $db)
    {
        $this->updateMode = true;
        $step = $currentStep - 1;
        switch ($step) {
            case 1:
                if ($this->updateMode == false) {
                    $this->validate([
                        'invitation.theme_id' => 'required',
                        'invitation.invitation_url' => 'required|alpha_dash',
                    ]);
                } else {
                    $this->validate([
                        'invitation.theme_id' => 'required',
                        'invitation.invitation_url' => [
                            'required',
                            'alpha_dash',
                            Rule::unique('invitations', 'invitation_url')
                                ->ignore($this->invitation['invitation_id'], 'invitation_id')
                        ]
                    ]);
                }

                $db->theme_id = $this->invitation['theme_id'];
                $db->teaser_youtube_url = $this->invitation['teaser_youtube_url'];
                $db->invitation_url = $this->invitation['invitation_url'];
                $db->invitation_google_map = $this->invitation['invitation_google_map'];

                break;
            case 2:
                $this->validate([
                    'invitation.invitation_meta.contract.date' => 'required',
                    'invitation.invitation_meta.contract.start' => 'required',
                    'invitation.invitation_meta.contract.place' => 'required',
                    'invitation.invitation_meta.contract.address' => 'required',
                ]);

                $db->invitation_meta = $this->invitation['invitation_meta'];

                break;
            case 3:
                $this->validate([
                    'invitation.invitation_meta.reception.date' => 'required',
                    'invitation.invitation_meta.reception.start' => 'required',
                    'invitation.invitation_meta.reception.place' => 'required',
                    'invitation.invitation_meta.reception.address' => 'required',
                ]);

                $db->invitation_meta = $this->invitation['invitation_meta'];

                break;
            case 4:
                $this->validate([
                    'invitation.invitation_meta.brides.male.nickname' => 'required',
                    'invitation.invitation_meta.brides.male.fullname' => 'required',
                    'invitation.invitation_meta.brides.male.about' => 'nullable|sometimes',
                    'male_image' => 'image|nullable|sometimes'
                ]);

                $db->invitation_meta = $this->invitation['invitation_meta'];

                if ($this->male_image) {
                    $db->addMedia($this->male_image->getRealPath())->toMediaCollection('male_image');
                }

                break;

            case 5:
                $this->validate([
                    'invitation.invitation_meta.brides.female.nickname' => 'required',
                    'invitation.invitation_meta.brides.female.fullname' => 'required',
                    'invitation.invitation_meta.brides.female.about' => 'nullable|sometimes',
                    'female_image' => 'image|nullable|sometimes'
                ]);

                $db->invitation_meta = $this->invitation['invitation_meta'];

                break;
            case 6:
                $this->validate([
                    'cover_image' => 'image|nullable|sometimes'
                ]);
                if ($this->cover_image) {
                    $db->addMedia($this->cover_image->getRealPath())->toMediaCollection('cover_image');
                }
                if ($this->male_image) {
                    $db->addMedia($this->male_image->getRealPath())->toMediaCollection('male_image');
                }
                if ($this->female_image) {
                    $db->addMedia($this->female_image->getRealPath())->toMediaCollection('female_image');
                }
                break;
        }
        $db->save();
        if($currentStep == 7){
            $this->emit("showToast", ["message" => "Data saved", "type" => "success"]);
        }
    }
}
