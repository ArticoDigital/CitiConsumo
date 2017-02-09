@extends('layoutFront')

@section('Services')
    <section class="Images row between">
        <div class="small-12 col-12 medium-12" id="titulohome">Necesito...</div>
        <a href="{{url('mascotas')}}" class="small-6 col-4 medium-4">
            <figure class="Service-image"  style="margin: 0 auto;">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que cuide de tu mascota!</span>
                    </div>
                </div>
                <figcaption>Que cuiden a mi mascota</figcaption>
            </figure>
        </a>
        <a href="{{url('servicios-generales')}}" class="small-6 col-4 medium-4">
            <figure class="Service-image"  style="margin: 0 auto;">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/oficios.svg')}}" alt="oficios">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que te ayude con los oficios del hogar!</span>
                    </div>
                </div>
                <figcaption>Ayuda con las tareas del hogar</figcaption>
            </figure>
        </a>
        <a href="{{url('alimentos')}}" class="small-12 col-4 medium-4">
            <figure class="Service-image" style="margin: 0 auto;">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que prepare un plato delicioso para ti!</span>
                    </div>
                </div>
                <figcaption>Que preparen comida para mi</figcaption>
            </figure>
        </a>
    </section>
@endsection

@section('Header')
    <article class="Leyend menu-item-out-movile"><q>Innovando la forma en como consumimos</q></article>
@endsection

@section('content')
    <section class="HowItWorks">
        <span class="how_title">¿Cómo funciona?</span>
        <div>
            <img src="{{url('img/home.svg')}}" alt="">
        </div>
        <div style="clear:both;"></div>
        <div class="div_box_center">
            <a id="playVideo" class="btn_blue" href="#">VER VIDEO</a>
        </div>
    </section>
    <section class="Alert Video">
        <article class="Message" style="width:800px">
            <h2>Bienvenido a City Consumo</h2>
            <div class="Video-child">
                <video id="videoCorp" class="cover" width="100%" height="auto" controls>
                    <source src="{{url('videos/corporativo.mp4')}}">
                </video>
                <!--<span class="play"><img src="{{url('img/icons/play.svg')}}" alt="play"></span>
                <span class="stop"><img src="{{url('img/icons/pause.svg')}}" alt="pause"></span>-->
            </div>
            <a href="#" class="close">Cerrar</a>
        </article>
    </section>
@endsection

@section('scripts')
    <script>
        var video = document.getElementById("videoCorp");

        $('#playVideo').on('click', function(){
            $('.Alert.Video').attr('id' ,'Flex');
            video.play();
        });

        $('.Alert.Video .close').on('click', function(){
            $('.Alert.Video').attr('id' ,'');
            video.pause();
        });

    </script>
@endsection