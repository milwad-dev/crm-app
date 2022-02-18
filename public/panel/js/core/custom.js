function deleteItem(event, route, element = 'tr') {
    event.preventDefault();
    swal({
        title: "Are you sure about this?",
        text: "This will delete this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.post(route, {_method: "delete", _token: $('meta[name="_token"]').attr('content')})
            .done(function (response) {
                event.target.closest(element).remove();
                $.toast({
                    heading: 'Successful operation',
                    text: 'mission accomplished',
                    showHideTransition: 'slide',
                    icon: 'success'
                })
            })
            .fail(function (response) {
                $.toast({
                    heading: 'Failed operation',
                    text: 'Operation failed',
                    showHideTransition: 'slide',
                    icon: 'error'
                })
            })
        }
    });
}
