@extends('layoutFront')

@section('Video')
    <source src="{{url('videos/servicios-generales.mov')}}">
@endsection

@section('Header')
    <section class="Images row center">
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
@endsection