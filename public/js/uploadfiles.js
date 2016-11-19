$('.DropFiles-inside').on('dragenter click', function(e){
    $(this).addClass('Drag');
}).on('dragleave dragend mouseout drop', function(e){
    $(this).removeClass('Drag');
});

var $files = $('.drop-files-input');

$files.on("change", function (event) {
    var form_url = $(this).data("url");
    var identifier = $(this).siblings('input').attr('name');
    var CSRF_TOKEN = $('input[name="_token"]').val();
    var fd = new FormData();
    if(this.files[0].type == 'application/pdf' || this.files[0].type == 'image/jpeg' || this.files[0].type == 'image/jpg' || this.files[0].type == 'image/png') {
        $('.preload').removeClass("hidden");
        fd.append("file", this.files[0]);
        fd.append("identifier", identifier);
        fd.append("_token", CSRF_TOKEN);

        $.ajax({
            url: form_url,
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (fileName) {
                $('.preload').addClass("hidden");
                $('#' + identifier)
                    .val(fileName)
                    .siblings('.text_file').text(fileName)
                    .parent().addClass('active');
            },
            error: function () {
                alert('El archivo es demasiado grande');
                $('.preload').addClass("hidden");
            }
        });
    }
    else {
        alert('El archivo debe ser un pdf, imagen jpg o png');
    }
});

