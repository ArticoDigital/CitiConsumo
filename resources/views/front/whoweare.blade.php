@extends('layoutFront')

{{--
@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection
--}}

@section('Services')
    <section class="section-content row between">
        <h1 class="center">¿Quienes somos?</h1>
        <p>Cityconsumo.com es un sitio que innova manera en como consumimos todos los días, en lugar de dejar tu dinero en grandes corporaciones, podrías obtener la solución a tus necesidades, generando empleo a las personas de tu comunidad, más económico, fácil y rapido que pedir un domicilio tradicional.</p>
    </section>
@endsection

@section('content')
    <section class="HowItWorks">
        <span class="how_title">¿Cómo funciona?</span>
        <div>
            <img src="{{url('img/home.svg')}}" alt="">
        </div>
    </section>
@endsection