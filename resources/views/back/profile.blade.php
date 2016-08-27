@extends('layoutFront')

@section('content')
<!--
@if (count($errors) > 0)
            <ul>
        @foreach ($errors->all() as $error)
            
            <li>{{ $error }}</li>
            @endforeach
            </ul>

     @endif
    --> 
     <p>Editar usuario {{$userprofile}}</p>
    

            @if(Session::has('success'))
                <div class="success">
                    <p>¡El usuario se ha actualizado!</p>
                </div>
            @endif
    
    <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="user_id" value="{{ $userprofile->id }}">

      <div class="row" style="padding: 30px 0px;">
          <div class="col-4 row" style="flex-direction: column; align-items: center; padding: 0px 10px;">
              <div style="position:relative">
                  <div class="image-cropper">
                     <img src="{{asset('uploads/profiles/'. $userprofile->profile_image)}}" class="img-profile" alt="">
                          {!!  $errors->first('profile_image', '<p class="error">:message</p>')  !!}
                  </div>
                  <output class="result"></output>
                  
                  <div class="image-upload">
                    <span class="text_file"></span>
                      <label for="profile_image">
                          <img class="small-icon" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                      </label>

                      <input type="file" name="profile_image" class="images" id="profile_image">
                   </div>
                   
                 </div>
                 <div class="name-profile">{{$userprofile->name . " " .$userprofile->last_name}}</div>
                 <button class="button">Actualizar perfil</button>
              </div>
              
              <div class="col-5">
                    
                    
                    

                  <p class="profile-title" style="position: relative;">Datos personales<!--<img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt="">--></p>
                  <div class="profile-item">
                      <label for="name" class="row middle">
                        {!!  $errors->first('name', ':message')  !!}
                        <span class="col-5">Nombre(*)</span>
                        <input class="col-7" name="name" id="name" value="{{$userprofile->name}}" type="text">
                    </label>
                  </div>
                  <div class="profile-item">
                      <label for="last_name" class="row middle">
                        {!!  $errors->first('last_name', ':message')  !!}
                        <span class="col-5">Apellido(*)</span>
                        <input class="col-7" name="last_name" value="{{ $userprofile->last_name}}" id="last_name"
                               type="text">
                    </label>
                  </div>

                  <div class="profile-item">
                      <label for="email" class="row middle">
                        {!!  $errors->first('email', ':message')  !!}
                        <span class="col-5">Correo(*)</span>
                        <input class="col-7" name="email" value="{{ $userprofile->email}}" id="email"
                               type="text">
                    </label>
                  </div>
                  
                  <div class="profile-item">
                      <label for="birthday" class="row middle">
                        {!!  $errors->first('created_at', ':message')  !!}
                        <span class="col-5">Fecha de nacimiento</span>
                        

                        <input class="col-7" name="birthday" alt="calendar" value="{{$userprofile->birthday}}" id="birthday"
                               type="text">
                    </label>

                    </div>
                  <div class="profile-item">                  
                      <label for="place" class="row middle">
                        {!!  $errors->first('location', ':message')  !!}
                        <span class="col-5">Ciudad</span>

                          <input class="col-7" id="autocomplete" name="place" value="{{ $userprofile->location}}" type="text" placeholder="Lugar" >
                          <input class="field" id="lat" name="lat" type="hidden">
                          <input class="field" id="lng" name="lng" type="hidden">
                      </label>
                  </div>

                  <div class="profile-item">
                      <label for="address" class="row middle">
                        {!!  $errors->first('address',':message')  !!}
                        <span class="col-5">Dirección</span>
                        <input  class="col-7" name="address" value="{{ $userprofile->address}}" id="address"
                               type="text">
                    </label>
                  </div>

                   <div class="profile-item">
                      <label for="cellphone" class="row middle">
                        {!!  $errors->first('cellphone', ':message')  !!}
                        <span class="col-5">Celular</span>
                        <input class="col-7" name="cellphone" value="{{ $userprofile->cellphone}}" id="cellphone"
                               type="text">
                    </label>
                  </div>

                  <div class="profile-item">
                      <label for="phone" class="row middle">
                        {!!  $errors->first('phone', ':message')  !!}
                        <span class="col-5">Teléfono</span>
                        <input class="col-7" name="phone" value="{{ $userprofile->phone}}" id="phone"
                               type="text">
                    </label>
                  </div>



                  <p class="profile-title">Seguridad</p>
                  <div class="row profile-item border-bottom">
                      <div class="col-12">Cambiar contraseña <img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt=""></div>
                  </div>
                  <div class="row profile-item border-bottom">
                      <div class="col-12">Información de la cuenta <img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt=""></div>
                  </div>
              </div>
              <div class="col-3">
                      <div class="Image-money row center">
              
                  <div class="circle-money">
                   <div class="front">
                              <img src="{{asset('img/blue.svg')}}" alt="azul">
                              <div id="inner-text" class="row center" style="flex-direction: column; align-items: center;">
                                  <span class="txt-value">Valor recaudado</span>
                                  <span class="profile-value">$100.000</span>
                                  <span class="btn-charge">Cobrar</span>
                              </div>
                              </div>
                              </div>
                  </div>
              </div>
          </div>
          
        </form>
        <div class="row border-bottom">
            <div class="row profile-servicesquant">Servicios (0)</div>
            
        </div>
        <div class="div_box_center">
                <a class="profile-btn-blue" href="{{route('uploadFiles',$userprofile->id)}}">¡Empieza a ofrecer tus servicios!</a>
        </div>

        <!--Servicios-->
        <table class="rwd-table">
          <tr class="header-table">
            <th width="80px">Editar</th>
            <th width="50%">Servicio</th>
            <th>Precio</th>
            <th>Activar</th>
          </tr>
          <tr>
            <td data-th="Actions" class="row"> 
                <img class="small-icon-product" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                <img class="small-icon-product" src="{{url('img/x-eliminar-imagen.svg')}}" alt="">

            </td>
            <td data-th="Service">
              <article class="row top Profile-productSection " style="align-items: stretch">
                <figure class="col-3">
                    <img src="{{asset('img/plato.png')}}" alt="">
                </figure>
                <div class="Profile-productInfo col-9">
                    <h3>Ensalada de Manzana-kiwi</h3>
                    <b>5 platos disponibles</b>
                </div>
              </article>
            </td>
            <td data-th="Price" class="center"><b>$30.000</b></td>
            <td data-th="Enable">
                <div class="switch">
                  <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                  <label for="cmn-toggle-1"></label>
                </div>
            </td>
          </tr>
          <tr>
            <td data-th="Actions" class="row"> 
                <img class="small-icon-product" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                <img class="small-icon-product" src="{{url('img/x-eliminar-imagen.svg')}}" alt="">

            </td>
            <td data-th="Service">
              <article class="row top Profile-productSection " style="align-items: stretch">
                <figure class="col-3">
                    <img src="{{asset('img/plato.png')}}" alt="">
                </figure>
                <div class="Profile-productInfo col-9">
                    <h3>Sancocho de espinazo con aguacate y arepa, jugo de mora</h3>
                    <b>5 platos disponibles</b>
                </div>
              </article>
            </td>
            <td data-th="Price" class="center"><b>$10.000</b></td>
            <td data-th="Enable">
                 <div class="switch">
                  <input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                  <label for="cmn-toggle-2"></label>
                </div>
            </td>
          </tr>
        </table>
@endsection


@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $(".js-example-basic-single").select2({width: '100%'});



        var $date = $('#birthday');

        $date.daterangepicker({
          
       "singleDatePicker": true,
      "showDropdowns": true,
      "minDate": "1940/01/01",
      "maxDate": "2017/01/01",
      locale: {
        format: 'YYYY/MM/DD'
      }
});
       
    </script>
    <script src="{{asset('js/address.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>

    <script>

       
    
    //Cuando la imagen de perfil es vertical
    $(window).load(function(){
        $('.img-profile').each(function(){
        if($(this).width() < $(this).height()){
            $(this).css('width', '100%');
            $(this).css('height', 'auto');
        }

        });

      });


        $('.DropFiles-inside').on('dragenter click', function(e){
            $(this).addClass('Drag');
        }).on('dragleave dragend mouseout drop', function(e){
            $(this).removeClass('Drag');
        });


        $(".images").change(function() {
                //alert(this.value);
               // $(this).removeClass('drop-files-input');
                $( this ).parent().find( '.text_file' ).text("Guarda para actualizar");
//                $(this).find(".text_file").text(this.value);
            });

      
    </script>
    
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />

    <style type="text/css">


    </style>
@endsection
