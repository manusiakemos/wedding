<div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     {{$attributes->merge(['id' =>'modal_form'])}}
     xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="modal-dialog modal-{{$size}}">
        <div class="modal-content rounded-2xl dark:bg-gray-700">
            <div class="modal-header">
                <h4 class="heading">{{$title}}</h4>
                <button type="button" class="btn-circle bg-red-400 text-white" data-bs-dismiss="modal">
                    <span class="flex items-center fi-rr-cross"></span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
@push("scripts")
    @include("includes.modal-scripts",['selector' => $attributes['id']])
@endpush
