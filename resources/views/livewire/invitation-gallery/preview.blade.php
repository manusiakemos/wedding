<x-admin.modal id="modal_preview" size="md" title="Preview Image" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <div>
            <img src="{{asset($gallery['filename'])}}" alt="">
        </div>
        <div class="py-5 float-right">
            <button type="button" class="btn btn-secondary" wire:click="$emit('hide_modal_preview')">Close</button>
        </div>
    </div>
</x-admin.modal>
