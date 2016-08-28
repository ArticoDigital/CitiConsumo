@extends('layoutFront')

{{--
@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection
--}}

@section('Services')
    <section class="Images row between">
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
                <figcaption>Mascotas</figcaption>
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
                <figcaption>Oficios</figcaption>
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
                <figcaption>Comidas</figcaption>
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
            <a class="btn_blue" href="#">VER VIDEO</a>
        </div>
    </section>
@endsection