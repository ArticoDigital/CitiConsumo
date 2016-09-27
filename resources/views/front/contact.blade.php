@extends('layoutFront')



@section('Services')


    <section class="section-content row between">
        <h1 class="center">Contacto</h1>
        <div style="text-align:center; width:100%"><p>Llamanos, escribenos o por que no, utiliza nuestras redes sociales! te responderemos con la solucion, no con excusas!</p></div>
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
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_location.svg')}}" alt=""><span>calle 69A # 68B - 89</span></div>
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_phone.svg')}}" alt=""><span>(+57) 300 670 56 88<br>(+57) 315 490 57 97</span></div>
            <div class="col-4 meddium-4 small-12 row middle center"><img src="{{asset('img/contact_email.svg')}}" alt=""><span><a href="mailto:info@cityconsumo.com">info@cityconsumo.com</a></span></div>
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
                    <p>Queremos mejorar continuamente, por eso lo mejor es saber lo que piensas acerca de nuestro modelo de negocio y plataforma web, coloca lo que quieras, hasta un buen vainazo te recibimos!</p>
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