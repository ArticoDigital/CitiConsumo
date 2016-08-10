@extends('layoutBack')

@section('content')
    <div class="row" style="padding: 30px 0px;">
        <div class="col-4 row" style="flex-direction: column; align-items: center; padding: 0px 10px;">
            <div style="position:relative">
                <div class="image-cropper">
                    <img class="img-profile" src="https://upload.wikimedia.org/wikipedia/commons/9/91/F-15_vertical_deploy.jpg"  />
                </div>
                <img class="small-icon" src="{{url('img/lapiz-edicion.svg')}}" alt="">
               </div>
               <div class="name-profile">DANIEL RICARDO Quintero</div>
            </div>
            
            <div class="col-5">

                <p class="profile-title" style="position: relative;">Datos personales<img class="small-icon-2" src="{{url('img/lapiz-edicion.svg')}}" alt=""></p>
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
        <div class="row border-bottom">
            <div class="row profile-servicesquant">Servicios (0)</div>
            
        </div>
        <div class="div_box_center">
                <a class="profile-btn-blue" href="#">¡Empieza a ofrecer tus servicios!</a>
        </div>

        <!--Servicios-->
        <table class="rwd-table">
          <tr class="header-table">
            <th>Editar</th>
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
    
    <script>

    
    //Cuando la imagen de perfil es vertical
        $('.img-profile').each(function(){
        if($(this).width() < $(this).height()){
            $(this).css('width', '100%');
            $(this).css('height', 'auto');
        }

        });


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
    <style type="text/css">
        .cmn-toggle {
  position: absolute;
  margin-left: -9999px;
  visibility: hidden;
}
.cmn-toggle + label {
  display: block;
  position: relative;
  cursor: pointer;
  outline: none;
  user-select: none;
}


input.cmn-toggle-round-flat + label {
  padding: 2px;
  width: 60px;
  height: 30px;
  /*background-color: #dddddd;*/
  border-radius: 30px;
  transition: background 0.4s;
  margin: 0 auto;
}
input.cmn-toggle-round-flat + label:before,
input.cmn-toggle-round-flat + label:after {
  display: block;
  position: absolute;
  content: "";
}
input.cmn-toggle-round-flat + label:before {
  top: 2px;
  left: 2px;
  bottom: 2px;
  right: 2px;
  background-color: #C33D2D;
  border-radius: 30px;
  transition: background 0.4s;
}
input.cmn-toggle-round-flat + label:after {
  top: 0px;
  left: 0px;
  bottom: 4px;
  width: 34px;
  height: 34px;
  /*background-color: #dddddd;*/
  background-color:#0D2E47;
  border-radius: 50%;
  transition: margin 0.4s, background 0.4s;
}
input.cmn-toggle-round-flat:checked + label {
  /*background-color: #8ce196;*/
}
input.cmn-toggle-round-flat:checked + label:after {
  margin-left: 35px;
  /*background-color: #8ce196;*/
}

input.cmn-toggle-round-flat:checked  + label:before {
  background-color: #49B488;
}

    </style>
@endsection