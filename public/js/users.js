function updateUser(element){
    var preload = $('.preload'),
        data = {
            idUser: element.data('user'),
            _token: $('#token').val()
        };

    preload.removeClass("hidden");
    var $tr = element.parents('tr');
    var send = element.data('action');
    $.post(send, data, function (e) {
        preload.addClass("hidden");
        $('.messages-success').show();
        $tr.remove();
    });
}

$('.Admin-updateStateProvider').on('click', function () {
    var r = confirm("Esta seguro de aceptar");
    if (r) updateUser($(this));
});

$('.deactivateProvider').on('click', function () {
    var r = confirm("¿Está seguro de desactivar este proveedor?");
    if (r) updateUser($(this));
});

$('.close').on('click', function () {
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

        $filesContent.append("<a class='Button-table' style='display: block; margin: 1rem 0' href='" + route + '/' + nameFile  + "' target='_blank'> " + nameType + " </a>");
    });
    console.log($FilesContainer);
    $FilesContainer.addClass('showFiles');
});

