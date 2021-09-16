<div x-data="{ isOpen: false }" class="relative w-full flex justify-center items-center">
    <div class="flex items-center justify-between">
        <div class="items-center">
            <button @click="isOpen = !isOpen"
                    class="rounded-full overflow-hidden hover:border-red-400 focus:outline-none">
                <span class="flex items-center fi-rr-menu-dots"></span>
            </button>
        </div>
    </div>
    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
    <div x-show="isOpen"
         class="fixed left-1/2 right-1/2 z-90 w-40 bg-gray-700 rounded-lg border-2 border-gray-800 shadow-lg py-2 mt-16 z-10">
        <!--variant text, circle, normal -->
        <x-admin.button class="border-b text-white"
                        variant="text"
                        wire:click="$emit('confirmDestroy', {{$row->invitation_id}})">
            Delete
        </x-admin.button>
        <a href="{{route('invitation.detail', $row->invitation_id)}}">
            <x-admin.button class="border-b text-white" variant="text">
                Edit Detail
            </x-admin.button>
        </a>
        <a href="{{route('invitation.gallery', $row->invitation_id)}}">
            <x-admin.button class="text-white" variant="text">
                Gallery
            </x-admin.button>
        </a>
    </div>
</div>
