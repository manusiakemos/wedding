<script>
    Livewire.on("confirmDestroy", (id) => {
        let n = new Noty({
            modal: true,
            layout: 'center',
            text: 'Do you want to continue?',
            buttons: [
                Noty.button('YES', 'btn bg-blue-500 text-white :hover mr-1', function () {
                    @this.destroy(id);
                    n.close();
                }),
                Noty.button('NO', 'btn bg-red-500 text-white :hover mr-1 mx-1', function () {
                    n.close();
                })
            ]
        });
        n.show();
    });
    Livewire.on("refreshDt", (showNoty = false) => {
        console.log('{{$table}}');
        Livewire.components.getComponentsByName('{{$table}}')[0].$wire.$refresh();
        if (showNoty) {
            new Noty(
                {
                    text: 'Refresh Datatable',
                    theme: 'mint',
                    type: 'info',
                    timeout: 1500
                }
            ).show();
        }else{
            window.location.reload();
        }
    });
</script>
