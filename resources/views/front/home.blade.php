@extends('layoutFront')

@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection

@section('Header')
    <section class="Images row center">
        <a href="{{url('mascotas')}}">
            <figure class="Service-image">
                <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
                <figcaption>Mascotas</figcaption>
            </figure>
        </a>
        <a href="{{url('servicios-generales')}}">
            <figure class="Service-image">
                <img src="{{asset('img/oficios.svg')}}" alt="oficios">
                <figcaption>Oficios</figcaption>
            </figure>
        </a>
        <a href="{{url('alimentos')}}">
            <figure class="Service-image">
                <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                <figcaption>Comidas</figcaption>
            </figure>
        </a>
    </section>
    <article class="Leyend"><q>Innovando la forma en como consumimos</q></article>
@endsection

@section('content')
@endsection