<x-admin.modal id="modal_form" size="md" :title="$updateMode ? 'Edit' : 'Create'" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form action="#" wire:submit.prevent="save">

        <x-input.form-group class="form-group" label="Name" key="name" model="theme.name">
            <x-input.text id="name" wire:model.defer="theme.name"></x-input.text>
        </x-input.form-group>

        <x-input.form-group class="form-group" label="Key" key="key" model="theme.key">
            <x-input.text id="key" wire:model.defer="theme.key"></x-input.text>
        </x-input.form-group>

        <div class="py-5 float-right">
            <button type="button" class="btn btn-secondary" wire:click="$emit('hideModal')">Close</button>
            <button type="submit" class="btn btn-primary" wire:click="save">
                {{$updateMode ? "Save Changes" : "Save"}}
            </button>
        </div>
    </form>
</x-admin.modal>
