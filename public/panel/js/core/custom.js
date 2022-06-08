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

function updateStatus(event, route, status, field = 'status' , parent = 'tr' , target = 'td.'){
    event.preventDefault();
    swal({
        title: "Are you sure about this?",
        text: "This will change the status of this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.post(route, { _method: "PATCH", _token: $('meta[name="_token"]').attr('content') })
            .done(function (response) {
                $(event.target).closest(parent).find(target + field).text(status);
                let approved = 'approved';
                let rejected = 'rejected';
                if (status == "approved") {
                    $(event.target).closest(parent).find(target + field)
                    .html("<span class='badge rounded-pill badge-light-success me-1'>" + approved + "</span>");
                } else {
                    $(event.target).closest(parent).find(target + field)
                    .html("<span class='badge rounded-pill badge-light-danger me-1'>" + rejected + "</span>");
                }
                $.toast({
                    heading: 'Successful operation',
                    text: response.message,
                    showHideTransition: 'slide',
                    icon: 'success'
                })
                .fail(function (response) {
                    $.toast({
                        heading: 'Failed operation',
                        text: response.message,
                        showHideTransition: 'slide',
                        icon: 'error'
                    })
                })
            })
        }
    });
}
