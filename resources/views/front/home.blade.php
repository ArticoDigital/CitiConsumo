@extends('layoutFront')

@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection

@section('Header')
    <section class="Images row center">
        <a href="{{url('mascotas')}}">
            <figure class="Service-image">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que cuide de tu mascota!</span>
                    </div>
                </div>
                <figcaption>Mascotas</figcaption>
            </figure>
        </a>
        <a href="{{url('servicios-generales')}}">
            <figure class="Service-image">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/oficios.svg')}}" alt="oficios">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que te ayude con los oficios del hogar!</span>
                    </div>
                </div>
                <figcaption>Oficios</figcaption>
            </figure>
        </a>
        <a href="{{url('alimentos')}}">
            <figure class="Service-image">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que prepare un plato delicioso para ti!</span>
                    </div>
                </div>
                <figcaption>Comidas</figcaption>
            </figure>
        </a>
    </section>
    <article class="Leyend"><q>Innovando la forma en como consumimos</q></article>
@endsection

@section('content')
    <section class="HowItWorks">
        <span class="how_title">¿Cómo funciona?</span>
        <div>
            <img src="{{url('img/home.svg')}}" alt="">
            <div class="how_box">
            <span class="how_number">1</span><br><span class="how_text">Selecciona un servicio en el landing.</span>
            </div>
            <div class="how_box">
            <span class="how_number">2</span><br><span class="how_text">Ingresa los datos para tu búsqueda.</span>
            </div>
            <div class="how_box">
            <span class="how_number">3</span><br><span class="how_text">Ubica quien te ayude en el mapa.</span>
            </div>
            <div class="how_box">
            <span class="how_number">4</span><br><span class="how_text">¡Disfruta al máximo el servicio!</span>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div class="div_box_center">
            <a class="btn_blue" href="#">Ver Video</a>
        </div>
    </section>
@endsection