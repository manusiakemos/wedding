<div class="flex justify-center items-center">
    <x-admin.button class="bg-blue-500 text-white hover:bg-blue-400"
                    variant="circle"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                    wire:click="$emit('editListener',{{$row->user_id}})">
        <span class="flex items-center fi fi-br-pencil"></span>
    </x-admin.button>
    <x-admin.button variant="circle" class="bg-red-500 text-white hover:bg-red-400"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                    wire:click="$emit('confirmDestroy', {{$row->user_id}})">
        <span class="flex items-center fi fi-br-trash"></span>
    </x-admin.button>
</div>
