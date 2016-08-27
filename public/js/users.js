


$('.Admin-updateStateProvider').on('click', function () {
    var r = confirm("Esta seguro de aceptar");
    if (r) {
        var data = {
                idUser: $(this).data('user'),
                _token: $('#token').val()
            },
            $loader = $(this).siblings('.loader');
        var $tr = $(this).parents('tr');
        var send = $(this).data('action') ;
        $.post(send, data, function (e) {
            $('.messages-success').show();
            $tr.remove();
        });
    }
});

