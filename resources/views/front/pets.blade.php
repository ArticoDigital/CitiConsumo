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
    </section>
    <form class="Form row center col-9">
        <label for="place" class="col-3">
            <input id="place" name="place" type="text" placeholder="Lugar">
        </label>
        <label for="date" class="col-3">
            <input id="date" name="date" type="text" placeholder="Fecha de Hospedaje">
        </label>
        <label for="size" class="col-3">
            <input id="size" name="size" type="text" placeholder="Tamaño">
        </label>
        <label for="breed" class="col-3">
            <input id="breed" name="breed" type="text" placeholder="Raza">
        </label>
        <button class="Button yellow" style="margin: 65px 0">Buscar</button>
    </form>
@endsection

@section('content')
@endsection