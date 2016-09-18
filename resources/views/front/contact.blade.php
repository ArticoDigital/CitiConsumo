@extends('layoutFront')



@section('Services')


    <section class="section-content row between">
        <h1 class="center">Contacto</h1>
        <div style="text-align:center; width:100%"><p>Cityconsumo.com es un sitio que innova manera en como consumimos todos los días.</p></div>
        @if(count($errors) > 0)
            <div class="row middle center error-message">
               <p>Debes llenar todos los campos para el envio del mensaje.</p>
            </div>
        @elseif(isset($success))
            <div class="row middle center success-message">
                <p>Mensaje enviado satisfactoriamente.</p>
            </div>
        @endif
     
        <div class="row middle contact-cols">
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_location.svg')}}" alt=""><span>Calle 130 60-30</span></div>
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_phone.svg')}}" alt=""><span>(+57) 306 20 26<br>(+57) 306 20 26</span></div>
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_email.svg')}}" alt=""><span>info@cityconsumo.com</span></div>
        </div>
    </section>
@endsection

@section('content')
    <section class="help-us row center bottom">
        
        <div class="col-4 medium-3 menu-item-out-movile" style="max-height: 360px;">
                    <img src="{{asset('img/persona.svg')}}" alt="" style="max-height: 360px;">
        </div>
        <div class="col-4 medium-5 small-12 message">
               <h2>Ayudanos a Mejorar</h2>
                    <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typese</p>
        </div>

            


        <div class="col-4 medium-4 small-12">


            <div class="formulario-contacto">
                <form id="contact_form" action="{{route('contactPost')}}" method="POST" enctype="multipart/form-data">
                 <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="item-contacto">
                        <label for="name" class="row middle">
                            
                            <span class="col-12 small-12">{!!  $errors->first('name', ':message')  !!}</span>
                            <input class="col-12 small-12"  placeholder="Tu nombre" name="name" id="name" value="{{old('name')}}" type="text">
                        </label>
                    </div>
                    <div class="item-contacto">
                        <label for="email" class="row middle">
                            
                            <span class="col-12 small-12">{!!  $errors->first('email', ':message')  !!}</span>
                            <input class="col-12 small-12" placeholder="Tu correo" name="email" id="email" value="{{old('email')}}" type="text">
                        </label>
                    </div>
                     <div class="item-contacto">
                        <label for="message" class="row middle">
                            <span class="col-12 small-12">{!!  $errors->first('message', ':message')  !!}</span>
                            <textarea class="col-12 small-12" name="message" id="message" value="{{old('message')}}" placeholder="Tu mensaje"  rows="7" type="text"></textarea>
                        </label>
                    </div>
                   
                    <input id="submit_button" type="submit" value="Enviar" class="button" style="" />
                </form>                     
            </div>
        </div>
      
    </section>
@endsection