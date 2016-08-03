@extends('layoutLoggedIn')

@section('content')
<div class="content-form">
        <div class="left-block"><img src="{{url('img/bg-formulario.svg')}}" alt="">
        <p class="text-over">Para ser parte de cityconsumo y puedas ofrecer tus servicios, necesitamos que llenes el siguiente formulario, el cual pasará por un proceso de certificación, si todo está en orden te enviaremos un mensaje para que puedas empezar a publicar tus servcios.</p>
        </div>
        <div class="block-form">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="fileUpload">
            <section class="DropFilesSmall">
                        <label class="DropFiles-inside" for="RutFile">
                            <span class="rectangle">Selecciona el archivo</span> <span class="text_file">Arrastra aquí el RUT</span>
                            <input type="file"  class="drop-files-input" name="RutFile" id="RutFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                        </label>
            </section>

            <section class="DropFilesSmall">
                        <label class="DropFiles-inside" for="CCFile">
                            
                            <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí la CC escaneada</span>
                           
                            <input type="file"  class="drop-files-input" name="CCFile" id="CCFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                        </label>
            </section>
            
            <section class="DropFilesSmall">
                        <label class="DropFiles-inside" for="BankFile">
                            <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Certificado bancario</span>
                            
                          
                            <input type="file"  class="drop-files-input" name="BankFile" id="BankFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                        </label>
            </section>

            <section class="DropFilesSmall">
                        <label class="DropFiles-inside" for="ServicesFile">
                            <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el Recibo servicios públicos</span>
                            
                            <input type="file"  class="drop-files-input" name="ServicesFile" id="ServicesFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                        </label>
            </section>

            <section class="DropFilesSmall">
                        <label class="DropFiles-inside" for="HistoryFile">
                            <span class="rectangle">Selecciona el archivo</span><span class="text_file">Arrastra aquí el antecedente de procuraduría</span>
                            
                            
                            <input type="file"  class="drop-files-input" name="HistoryFile" id="HistoryFile" accept="image/jpeg, image/jpg, image/png, application/pdf">
                        </label>
            </section>
            <div style="text-align:center">
            <input type="submit" id="boton-enviar" value="" name="submit">
            </div>
            </div>
            
            
        </form>
        
        </div>
        
        <div style="clear:both;"></div>
        
        
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    
    <script>
        $('.DropFiles-inside').on('dragenter click', function(e){
            $(this).addClass('Drag');
        }).on('dragleave dragend mouseout drop', function(e){
            $(this).removeClass('Drag');
        });


        $(".drop-files-input").change(function() {
                //alert(this.value);
               // $(this).removeClass('drop-files-input');
                $( this ).parent().find( '.text_file' ).text(this.value);
                $( this ).parent().find( '.rectangle' ).css("background-color","green");
                $( this ).parent().css("border","dashed 2px green");
//                $(this).find(".text_file").text(this.value);
            });

      
    </script>
    
@endsection
@section('styles')

@endsection