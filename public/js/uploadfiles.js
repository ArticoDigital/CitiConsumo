 $('.DropFiles-inside').on('dragenter click', function(e){
            $(this).addClass('Drag');
        }).on('dragleave dragend mouseout drop', function(e){
            $(this).removeClass('Drag');
        });

        $(".drop-files-input").change(function() {
            $( this ).parent().find( '.text_file' ).text(this.value);
            $( this ).parent().find( '.rectangle' ).css("background-color","green");
            $( this ).parent().css("border","dashed 2px green");
        });

  var $files = $('.drop-files-input'),
    $output;
/*
$files.on('change', function () {

    if (this.files[0].size < 2400000) {

        $('.preload').removeClass("hidden");
        uploadImage(this.files[0]);

    } else {
        alert("El tamaño de la imagen debe ser inferior a 2MB");
    }

});

*/
$files.on("change", function (event) {
    var form_url = $(this).data("url");
    var identifier = $(this).attr('name');
    //alert(identifier);
    var CSRF_TOKEN = $('input[name="_token"]').val();
    var fd = new FormData();
    if(this.files[0].type != 'application/pdf' && this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg'  && this.files[0].type != 'image/png'){
        $(this).val('')
        alert('EL archivo debe ser un pdf, imagen jpg o png');
        return
    }
    $(this).parent().find('.preload').removeCalss("hidden");
    
    fd.append("file", this.files[0]);
    fd.append("identifier", identifier);
    fd.append("_token", CSRF_TOKEN);
    jQuery.ajax({
        url: form_url,
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data) {
            if (data.success) {
                $('#'+identifier+"Name").val(data.name);
                $('#'+identifier).parent().find('.preload').addCalss("hidden");
                /*PDFObject.embed(data.url, "#pdf", {
                    page: 1,
                    pdfOpenParams: {
                        navpanes: 1,
                        view: "FitH",
                        pagemode: "thumbs"
                    }
                });*/

            }

            console.log(data);
        }
    });


});

