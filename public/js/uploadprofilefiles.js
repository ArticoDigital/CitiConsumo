$('.DropFiles-inside').on('dragenter click', function(e){
    $(this).addClass('Drag');
}).on('dragleave dragend mouseout drop', function(e){
    $(this).removeClass('Drag');
});

var $files = $('.drop-files-input');

$files.on("change", function (event) {
    var form_url = $(this).data('url'),
        identifier = $(this).attr('name'),
        CSRF_TOKEN = $('input[name="_token"]').val(),
        user_id = $('input[name="user_id"]').val(), 
        fd = new FormData();

    if(this.files[0].type == 'image/jpeg' || this.files[0].type == 'image/jpg' || this.files[0].type == 'image/png') {
        if(this.files[0].size < 2500000){

            $('.preload').removeClass("hidden");
            fd.append("file", this.files[0]);
            fd.append("identifier", identifier);
            fd.append("_token", CSRF_TOKEN);
            fd.append("user_id", user_id);

            $.ajax({
                url: form_url,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (fileName) {
                    var imageprofile = $("#image_profile");
                    $('.preload').addClass("hidden");

                    imageprofile.html('<img src="/uploads/profiles/'+fileName+'" class="img-profile" alt="">')
                    
                    
                },
                error: function () {
                    alert('No se ha podido subir este archivo. Intenta nuevamente');
                    $('.preload').addClass("hidden");
                }
            });
        }
        else{
            alert('Suba un archivo con menos de 2.5MB');
        }
    }
    else {
        alert('El archivo debe ser imagen jpg o png.');
    }
});