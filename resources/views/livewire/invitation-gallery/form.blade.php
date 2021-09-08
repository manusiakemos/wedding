<x-admin.modal id="modal_form" size="md" :title="$updateMode ? 'Edit' : 'Create'" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form action="#" wire:submit.prevent="save">
        <x-input.form-group label="Image" key="image" model="image">
            <x-input.filepond data-event-name="image" wire:model="image"></x-input.filepond>
        </x-input.form-group>

        <x-input.form-group label="Title" key="gallery.title" model="gallery.title">
            <x-input.text id="gallery.title" type="text" class="p-3" wire:model="gallery.title"></x-input.text>
        </x-input.form-group>

        <x-input.form-group label="Desc" key="gallery.desc" model="gallery.desc">
            <x-input.textarea id="gallery.desc" type="text" wire:model="gallery.desc"></x-input.textarea>
        </x-input.form-group>

        <div class="py-5 float-right">
            <button type="button" class="btn btn-secondary" wire:click="$emit('hide_modal_form')">Close</button>
            <button type="submit" class="btn btn-primary" wire:click="save">
                {{$updateMode ? "Save Changes" : "Save"}}
            </button>
        </div>
    </form>
</x-admin.modal>
