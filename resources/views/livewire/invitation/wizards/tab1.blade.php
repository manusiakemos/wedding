<x-input.form-group label="URL" key="invitation.invitation_url" model="invitation.invitation_url">
    <x-input.text id="invitation.invitation_url" wire:model.defer="invitation.invitation_url"></x-input.text>
</x-input.form-group>

<x-input.form-group label="Theme" key="invitation.theme_id" model="invitation.theme_id">
    <x-input.select method="theme"
                    id="invitation.theme_id"
                    wire:model.defer="invitation.theme_id"
                    :select2="false"></x-input.select>
</x-input.form-group>

<x-input.form-group label="Embed Google Maps" key="invitation.invitation_google_map"
                    model="invitation.invitation_google_map">
    <x-input.textarea id="invitation.invitation_google_map" wire:model.defer="invitation.invitation_google_map"></x-input.textarea>
</x-input.form-group>

<x-input.form-group label="Youtube Video ID" key="invitation.teaser_youtube_url"
                    model="invitation.teaser_youtube_url">
    <x-input.text id="invitation.teaser_youtube_url" wire:model.defer="invitation.teaser_youtube_url"></x-input.text>
</x-input.form-group>


