<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div x-init="initSelect2{{$method}}"
         class="wrapper rounded"
         x-data="{
                    selected : @entangle($attributes->wire('model')),
                    options : {{$options}}
             }"
         wire:ignore>
        <select x-model="selected"
                name="{{$method}}"
                id="{{$method}}"
                class="mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent focus:border-red-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0 text-sm"
                style="width: 100%">
            <template x-for="i in options">
                <option :value="i.{{$value}}" x-text="i.{{$text}}"></option>
            </template>
        </select>
    </div>
</div>

@push("scripts")
    <script>
        function initSelect2{{$method}}() {
            this.select2 = $('#{{$method}}').select2({
                dropdownParent: '.wrapper'
            });
            this.select2.on('select2:select', (event) => {
                @this.set("{{ $attributes["wire:model.defer"] }}", event.target.value);
                this.selected = event.target.value;
            });
            this.$watch('selected', (value) => {
                @this.set("{{ $attributes["wire:model.defer"] }}", value);
                this.select2.val(value).trigger('change');
            });
        }
    </script>
@endpush
