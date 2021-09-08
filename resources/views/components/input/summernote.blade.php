<div wire:ignore>
    <textarea
        class="mt-1 block w-full rounded-md dark:bg-gray-600 bg-gray-200 border-transparent focus:border-red-400 focus:bg-gray-200 dark:focus:bg-gray-800 focus:ring-0 text-sm text-gray-700 dark:text-gray-200"
        x-init="initSummernote"
        x-data="{selected : @entangle($attributes->wire('model'))}"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    ></textarea>
</div>

@push("styles")
    <link href="{{asset('vendor/summernote/summernote-lite.css')}}" rel="stylesheet">
@endpush

@push("scripts")
    <script src="{{asset('vendor/summernote/summernote-lite.js')}}"></script>
    <script>
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButtonImage = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                container : context.layoutInfo.editor,
                click: function() {
                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });
                }
            });
            return button.render();
        };

        var LFMButtonFile = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="flex items-center fi-rr-file" style="height:20px;"></i> ',
                tooltip: 'Insert file with filemanager',
                container : context.layoutInfo.editor,
                click: function() {
                    context.invoke('saveRange');
                    lfm({type: 'file', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                        context.invoke('restoreRange');
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('pasteHTML', `<iframe height="500" width="100%" src="${lfmItem.url}"></iframe>`);
                        });
                    });
                }
            });
            return button.render();
        };

        function initSummernote() {
            this.sn = $('#{{$attributes->whereStartsWith('id')->first()}}').summernote({
                callbacks: {
                    onChange: function (contents) {
                        this.selected = contents
                        @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', contents);
                    },
                },
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'lfm_file', 'lfm_image', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                buttons: {
                    lfm_image: LFMButtonImage,
                    lfm_file : LFMButtonFile
                }
            });

            this.$watch('selected', (value) => {
                @this.set("{{ $attributes->whereStartsWith('wire:model')->first() }}", value);
            });
        }
    </script>
    <script>
        window.Livewire.on("setSummernoteValue", ()=>{
            $('#{{$attributes->whereStartsWith('id')->first()}}').summernote('code', @this.get('{{ $attributes->whereStartsWith('wire:model')->first() }}'));
        });

        $(document).ready(function (){
            Livewire.emit('setSummernoteValue')
        });
    </script>
@endpush
