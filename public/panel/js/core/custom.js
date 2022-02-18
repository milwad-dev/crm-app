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
        title: "آیا مطمن هستی از این کار؟",
        text: "با این کار این ایتم وضعیتش تغغیر می کند!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.post(route, { _method: "PATCH", _token: $('meta[name="_token"]').attr('content') })
                    .done(function (response) {
                        $(event.target).closest(parent).find(target + field).text(status);
                        if (status == "تایید شده") {
                            $(event.target).closest(parent).find(target + field).html("<span class='text-success'>" + status + "</span>");
                        } else {
                            $(event.target).closest(parent).find(target + field).html("<span class='text-error'>" + status + "</span>");
                        }
                        $.toast({
                            heading: 'عملیات موفق',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                            .fail(function (response) {
                                $.toast({
                                    heading: 'عملیات ناموفق',
                                    text: response.message,
                                    showHideTransition: 'slide',
                                    icon: 'error'
                                })
                            })
                    })
            }
        });
}
