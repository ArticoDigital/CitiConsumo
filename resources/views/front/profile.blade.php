@extends('layoutLoggedIn')

@section('content')
<div class="content-form">
        <div class="row" style="padding: 30px 0px;">
            <div class="col-5 row" style="flex-direction: column; align-items: center; padding: 0px 10px;">
               <div style="position:relative">
                <div class="image-cropper">
                    <img class="img-profile" src="http://www.electricvelocity.com.au/Upload/Blogs/smart-e-bike-side_2.jpg"  />
                </div>
                <img class="small-icon" src="{{url('img/lapiz-edicion.svg')}}" alt="">
               </div>
               <div class="name-profile">DANIEL RICARDO Quintero</div>
            </div>
            <div class="col-7">

                <p class="profile-title">Datos personales</p>
                <div class="row profile-item">
                    <div class="col-6">Usuario</div>
                    <div class="col-6 profile-data">danielrqo</div>
                </div>
                <div class="row profile-item">
                    <div class="col-6">Correo</div>
                    <div class="col-6 profile-data">danielrqo@gmail.com</div>
                </div>
                <div class="row profile-item">
                    <div class="col-6">Ciudad</div>
                    <div class="col-6 profile-data">Bogotá, Colombia</div>
                </div>
                <div class="row profile-item">
                    <div class="col-6">Fecha de nacimiento</div>
                    <div class="col-6 profile-data">03/01/1986</div>
                </div>
                <div class="row profile-item">
                    <div class="col-6">Dirección</div>
                    <div class="col-6 profile-data">Cra 21 # 24 - 19</div>
                </div>
                <div class="row profile-item">
                    <div class="col-6">Teléfono</div>
                    <div class="col-6 profile-data">300 367 62 73</div>
                </div>


                <p class="profile-title">Seguridad</p>
                <div class="row profile-item border-bottom">
                    <div class="col-12">Cambiar contraseña <img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt=""></div>
                </div>
                <div class="row profile-item border-bottom">
                    <div class="col-12">Información de la cuenta <img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt=""></div>
                </div>
            </div>
        </div>
        <div class="row border-bottom">
            <div class="row profile-servicesquant">Servicios (0)</div>
            
        </div>
        <div class="div_box_center">
                <a class="profile-btn-blue" href="#">¡Empieza a ofrecer tus servicios!</a>
        </div>
        
        <div style="clear:both; padding: 0px 0px 30px 0px"></div>        
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