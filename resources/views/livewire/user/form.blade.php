<x-admin.modal id="modal_form" size="lg" :title="$updateMode ? 'Edit' : 'Create'" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form action="#" wire:submit.prevent="save">

        <x-input.form-group class="form-group" label="Nama" key="name" model="user.name">
            <x-input.text id="nama" wire:model.defer="user.name"></x-input.text>
        </x-input.form-group>

        <x-input.form-group class="form-group" label="Username" key="username" model="user.username">
            <x-input.text id="username" wire:model.defer="user.username"></x-input.text>
        </x-input.form-group>

        <x-input.form-group class="form-group" label="Email" key="email" model="user.email">
            <x-input.text id="email" wire:model.defer="user.email" type="email"></x-input.text>
        </x-input.form-group>

        <x-input.form-group class="form-group" label="Role" key="role" model="user.role">
            <x-input.select method="role" :select2="false" wire:model.defer="user.role"></x-input.select>
        </x-input.form-group>

        <x-input.form-group class="form-group" label="About" key="about" model="user.about">
            <x-input.summernote id="about" wire:model="user.about"></x-input.summernote>
        </x-input.form-group>

        <div class="py-5 float-right">
            <button type="button" class="btn btn-secondary" wire:click="$emit('hideModal')">Close</button>
            <button type="submit" class="btn btn-primary" wire:click="save">
                {{$updateMode ? "Save Changes" : "Save"}}
            </button>
        </div>
    </form>
</x-admin.modal>
