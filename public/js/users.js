$('.Admin-updateStateProvider').on('click', function () {
    var r = confirm("Esta seguro de aceptar");
    if (r) {
        var data = {
            idUser: $(this).data('user'),
            _token: $('#token').val()
        };
        $('.preload').removeClass("hidden");
        var $tr = $(this).parents('tr');
        var send = $(this).data('action');
        $.post(send, data, function (e) {
            $('.preload').addClass("hidden");
            $('.messages-success').show();
            $tr.remove();
        });
    }
});

$('.close').on('click', function () {
    console.log('ss');
    $('.Files-container').removeClass('showFiles');
});
$('.viewFiles').on('click', function () {
    var id = $(this).data('id'),
        name = $(this).data('name'),
        route = $('#tableUsers').data('route'),
        $files = $('.files-' + id),
        $filesContent = $('.Files-data'),
        $nameUser = $('#nameUser'),
        $FilesContainer  =  $('.Files-container');
    $filesContent.html('');
    $nameUser.html(name);
    $files.each(function (index) {

        var nameFile = $(this).val();
        var nameType = $(this).data('type');


        $filesContent.append("<a class='Button-table' style='display: block; margin: 1rem 0' href='" + route + '/' + nameFile  + "' target='_blank'> " + nameFile + " </a>");


    });
    console.log($FilesContainer);
    $FilesContainer.addClass('showFiles');
});

