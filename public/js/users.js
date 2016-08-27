$('.Admin-updateStateProvider').on('click', function () {

    var r = confirm("Esta seguro de aceptar");
    if (r) {
        var data = {
                idUser: $(this).data('user'),
                _token: $('#token').val()
            },
            $loader = $(this).siblings('.loader');
        var td = $(this);
       var  send = ($(this).data('action') == 'enabled') ? $('#tableUsers').data('routeenabled'): $('#tableUsers').data('routedisabled');
        console.log(send)
        $.post(send , data, function (e) {
            console.log(e)
            if (e.success) {
                td.remove();
            }
        });

    }

});

