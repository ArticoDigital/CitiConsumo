


$('.Admin-updateStateProvider').on('click', function () {
    var r = confirm("Esta seguro de aceptar");
    if (r) {
        var data = {
                idUser: $(this).data('user'),
                _token: $('#token').val()
            };
            $('.preload').removeClass("hidden");
        var $tr = $(this).parents('tr');
        var send = $(this).data('action') ;
        $.post(send, data, function (e) {
            $('.preload').addClass("hidden");
            $('.messages-success').show();
            $tr.remove();
        });
    }
});

