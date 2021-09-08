<div class="flex justify-center items-center">
    <x-admin.button class="bg-blue-500 text-white hover:bg-blue-400"
                    variant="circle"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                    wire:click="$emit('editListener',{{$row->gallery_id}})">
        <span class="flex items-center fi fi-br-pencil"></span>
    </x-admin.button>
    <x-admin.button variant="circle" class="bg-yellow-500 hover:bg-yellow-400  text-white"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Preview"
                    wire:click="$emitUp('preview',{{$row->gallery_id}})">
        <span class="flex items-center fi fi-br-eye"></span>
    </x-admin.button>
    <x-admin.button variant="circle" class="bg-red-500 text-white hover:bg-red-400"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                    wire:click="$emit('confirmDestroy', {{$row->gallery_id}})">
        <span class="flex items-center fi fi-br-trash"></span>
    </x-admin.button>
</div>
