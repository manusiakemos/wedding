<script>
    var {{$selector ?? 'modal_form'}} = new bootstrap.Modal(document.querySelector("#{{$selector ?? 'modal_form'}}"));
    window.Livewire.on('show_{{$selector ?? 'modal_form'}}', () => {
        {{$selector ?? 'modal_form'}}.show();
    });
    window.Livewire.on('hide_{{$selector ?? 'modal_form'}}',() => {
        {{$selector ?? 'modal_form'}}.hide();
    });
</script>
