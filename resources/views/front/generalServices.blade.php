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
    <form class="Form row center col-8" method="GET" action="{{route('platform', 'oficios')}}">
        <label for="place" class="col-4">
            <input id="place" name="place" type="text" placeholder="Lugar">
        </label>
        <label for="service" class="col-4">
            <select class="js-example-basic-single" id="service" name="service">
                <option value="" selected>Servicio</option>
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </label>
        <label for="date" class="col-4">
            <input class="datetimepicker_mask" id="date" name="date" type="text" placeholder="Fecha">
        </label>
        <button class="Button" style="margin: 65px 0">Buscar</button>
    </form>
@endsection

@section('content')
@endsection

@section('scripts')
    <script src="{{asset('js/datetimepicker.js')}}"></script>
    <script src="{{asset('js/select2.js')}}"></script>
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('css/datetimepicker.css')}}" rel="stylesheet">
@endsection