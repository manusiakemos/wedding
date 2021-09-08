<div class="py-3">
    <span class="dark:text-gray-300 text-gray-700">Also Invite</span>
    @if(count($invitation['invitation_meta']['brides'][$type]['also_invite']) > 0)
        @foreach($invitation['invitation_meta']['brides'][$type]['also_invite'] as $index => $item)
            <div class="flex">
                <x-input.text type="text"
                              wire:model.defer="invitation.invitation_meta.brides.{{$type}}.also_invite.{{$index}}"></x-input.text>
                <x-admin.button wire:click="add('{{$type}}')">+</x-admin.button>
                @if($index > 0)
                    <x-admin.button wire:click="remove('{{$type}}',{{$index}})">-</x-admin.button>
                @endif
            </div>
        @endforeach

        @else

        <div class="flex">
            @php($index = 0)
            <x-input.text type="text"
                          wire:model.defer="invitation.invitation_meta.brides.{{$type}}.also_invite.{{$index}}"></x-input.text>
            <x-admin.button wire:click="add('{{$type}}')">+</x-admin.button>
        </div>
    @endif
</div>

