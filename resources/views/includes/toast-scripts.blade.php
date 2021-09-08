<script>
    Livewire.on('showToast', (res) => {
        new Noty({
            text: res.message,
            theme: 'mint',
            type: res.type,
            timeout: 1300,
        }).on('afterClose', function() {
            if(res.reload){
                window.location.reload();
            }
        }).show();
    });
</script>
