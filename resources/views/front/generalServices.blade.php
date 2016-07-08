@extends('layoutFront')

@section('Video')
    <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
    <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
@endsection

@section('Header')
    <section class="Images row center">
        <a href="{{url('servicios-generales')}}">
            <figure class="Service-image">
                <img src="{{asset('img/oficios.svg')}}" alt="oficios">
                <figcaption>Oficios</figcaption>
            </figure>
        </a>
    </section>
    <form class="Form row center col-6">
        <label for="place" class="col-4">
            <input id="place" name="place" type="text" placeholder="Lugar">
        </label>
        <label for="service" class="col-4">
            <input id="service" name="service" type="text" placeholder="Servicio">
        </label>
        <label for="date" class="col-4">
            <input id="date" name="date" type="text" placeholder="Fecha">
        </label>
        <button class="Button" style="margin: 65px 0">Buscar</button>
    </form>
@endsection

@section('content')
    <h1>Servicios generales</h1>
    <span>ruta: localhost/servicios-generales</span>
@endsection