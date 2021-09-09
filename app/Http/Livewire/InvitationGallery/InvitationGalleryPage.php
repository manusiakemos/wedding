<?php


namespace App\Http\Livewire\InvitationGallery;


use App\Models\Invitation;
use App\Models\InvitationGallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class InvitationGalleryPage extends Component
{
    use WithFileUploads;

    public $invitation;

    public array $gallery = [
        "invitation_id" => "",
        "title" => "",
        "desc" => "",
        "filename" => "",
        "created_at" => "",
        "updated_at" => "",
    ];

    public $image = null;

    public $breadcrumbs = [
        ["link" => "#", "title" => "Admin"],
        ["link" => "#", "title" => "Invitation"],
        ["link" => "#", "title" => "Invitation Gallery"],
    ];

    public bool $updateMode = false;

    protected $listeners = [
        'editListener' => 'edit',
        'preview' => 'preview',
    ];


    public function mount($id)
    {
        $this->invitation = Invitation::find($id)->toArray();
        session()->put('active', 'invitation');
        session()->put('expanded', 'false');
    }

    public function render()
    {
        return view('livewire.invitation-gallery.invitation-gallery-page')
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

    public function preview($id)
    {
        $this->gallery = InvitationGallery::find($id)->toArray();
        $this->emit("show_modal_preview");
    }

    public function create()
    {
        $this->emit("show_modal_form");
        $this->updateMode = false;
    }


    public function store()
    {
        $this->validate([
            'image' => 'required|image'
        ]);
        if($this->handleFormRequest(new InvitationGallery)){
            $this->emit('hideModal');
            $this->emit("refreshDt");
            $this->emit("showToast", ["message" => "Gallery Created Successfully", "type" => "success"]);
            $this->reset(['image', 'gallery']);
        }else{
            $this->emit("showToast", ["message" => "Something Wrong Happened", "type" => "success"]);
        }
        $this->dispatchBrowserEvent('image');
    }


    public function edit($id)
    {
        $this->updateMode = true;
        $gallery = InvitationGallery::find($id);
        $this->gallery = $gallery->toArray();
        $this->emit("show_modal_form");
    }


    public function update()
    {
        $this->validate([
            'image' => 'image|nullable|sometimes'
        ]);
        $save = false;
        if (isset($this->gallery["gallery_id"])) {
            $db = InvitationGallery::find($this->gallery["gallery_id"]);
            if ($db) {
                $save = $this->handleFormRequest($db);
            }
            if ($save) {
                $this->emit("refreshDt");
                $this->emit("showToast", ["message" => "Gallery Updated Successfully", "type" => "success"]);
            } else {
                $this->emit("showToast", ["message" => "Gallery Failed", "type" => "error"]);
            }
        }
        $this->emit("hideModal");
        $this->reset(['image', 'gallery']);
        $this->dispatchBrowserEvent('image');
    }


    public function destroy($id)
    {
        $gallery = InvitationGallery::find($id);
        if($gallery->filename){
            File::delete(storage_path("app/{$gallery->filename}"));
        }
        $delete = $gallery->delete();
        if ($delete) {
            $this->emit("showToast", ["message" => "Gallery Deleted Successfully", "type" => "success"]);
        } else {
            $this->emit("showToast", ["message" => "Delete Failed", "type" => "success"]);
        }
        $this->emit("refreshDt");
    }

    private function handleFormRequest(InvitationGallery $db): bool
    {
        $db->invitation_id = $this->invitation['invitation_id'];
        $db->title = $this->gallery['title'];
        $db->desc = $this->gallery['desc'];
        if($this->image){
            if($db->filename && $this->updateMode){
                File::delete(storage_path("app/gallery/{$db->filename}"));
                File::delete(storage_path("app/gallery/thumb_{$db->filename}"));
            }
            $filename = $this->uploadImageIntervention($this->image);
            $this->image->storeAs('gallery',$filename);
            $db->filename = '/gallery/'.$filename;
        }
        return $db->save();
    }

    private function uploadImageIntervention($image)
    {
        $basename = Str::random();
        $thumbnail = 'thumb_' . $basename .'.'. $image->getClientOriginalExtension();
        $original = $basename .'.'. $image->getClientOriginalExtension();

        $image = $this->image;
        $img = Image::make($image->getRealPath())->encode('jpg', 65)
            ->resize(360, null, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $img->stream();
        Storage::disk('local')->put("/gallery/$thumbnail", $img);

        return $original;

    }
}
