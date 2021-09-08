<x-input.form-group label="date" key="date" model="invitation.invitation_meta.reception.date">
    <x-input.text type="date" wire:model.defer="invitation.invitation_meta.reception.date"></x-input.text>
</x-input.form-group>

<x-input.form-group label="start" key="start" model="invitation.invitation_meta.reception.start">
    <x-input.text type="time" wire:model.defer="invitation.invitation_meta.reception.start"></x-input.text>
</x-input.form-group>

<x-input.form-group label="finish" key="finish" model="invitation.invitation_meta.reception.finish">
    <x-input.text type="time" wire:model.defer="invitation.invitation_meta.reception.finish"></x-input.text>
</x-input.form-group>

<x-input.form-group label="city" key="city" model="invitation.invitation_meta.reception.city">
    <x-input.text wire:model.defer="invitation.invitation_meta.reception.city"></x-input.text>
</x-input.form-group>

<x-input.form-group label="place" key="place" model="invitation.invitation_meta.reception.place">
    <x-input.text wire:model.defer="invitation.invitation_meta.reception.place"></x-input.text>
</x-input.form-group>

<x-input.form-group label="address" key="address" model="invitation.invitation_meta.reception.address">
    <x-input.textarea wire:model.defer="invitation.invitation_meta.reception.address"></x-input.textarea>
</x-input.form-group>
