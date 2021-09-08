<x-input.form-group label="nickname" key="nickname" model="invitation.invitation_meta.brides.female.nickname">
    <x-input.text type="text" wire:model.defer="invitation.invitation_meta.brides.female.nickname"></x-input.text>
</x-input.form-group>

<x-input.form-group label="fullname" key="fullname" model="invitation.invitation_meta.brides.female.fullname">
    <x-input.text type="text" wire:model.defer="invitation.invitation_meta.brides.female.fullname"></x-input.text>
</x-input.form-group>

<x-input.form-group label="about" key="about" model="invitation.invitation_meta.brides.female.about">
    <x-input.textarea type="text" wire:model.defer="invitation.invitation_meta.brides.female.about"></x-input.textarea>
</x-input.form-group>

<x-input.form-group label="parent name" key="parent_name" model="invitation.invitation_meta.brides.male.parent_name">
    <x-input.text type="text" wire:model.defer="invitation.invitation_meta.brides.female.parent_name"></x-input.text>
</x-input.form-group>

@include("livewire.invitation.wizards.also_invite", ['type' => 'female'])




