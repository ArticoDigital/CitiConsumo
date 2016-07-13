@extends('layoutFront')

@section('Video')
    <source src="{{url('videos/ciudad.mov')}}">
    <!--<source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">-->
@endsection

@section('Header')
    <section class="Images row center">
        <a href="{{url('/alimentos')}}">
            <figure class="Service-image">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                        <span>Encuentra alguien que prepare un plato delicioso para ti!</span>
                    </div>
                </div>
                <figcaption>Comidas</figcaption>
            </figure>
        </a>
    </section>
    <form class="Form row center col-6">
        <label for="place" class="col-4">
            <input id="place" name="place" type="text" placeholder="Lugar">
        </label>
        <label for="food_type" class="col-4">
            <input id="food_type" name="food_type" type="text" placeholder="Tipo de comida">
        </label>
        <label for="date" class="col-4">
            <input id="date" name="date" type="text" placeholder="Fecha">
        </label>
        <button class="Button" style="margin: 65px 0">Buscar</button>
    </form>
@endsection

@section('content')
@endsection