<x-admin.modal id="modal_form" size="md" :title="$updateMode ? 'Edit' : 'Create'" xmlns:wire="http://www.w3.org/1999/xhtml">
    <form action="#" wire:submit.prevent="save">

        <x-input.form-group label="URL" key="invitation_url" model="invitation.invitation_url">
            <x-input.text wire:model.defer="invitation.invitation_url"></x-input.text>
        </x-input.form-group>

        <x-input.form-group label="Theme" key="theme_id" model="invitation.theme_id">
            <x-input.select method="theme"
                            wire:model.defer="invitation.theme_id"
                            :select2="false"></x-input.select>
        </x-input.form-group>

        <div class="py-5 float-right">
            <button type="button" class="btn btn-secondary" wire:click="$emit('hideModal')">Close</button>
            <button type="submit" class="btn btn-primary" wire:click="save">
                {{$updateMode ? "Save Changes" : "Save"}}
            </button>
        </div>
    </form>
</x-admin.modal>
