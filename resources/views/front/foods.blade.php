@extends('layoutFront')

@section('Video')
    <source src="{{url('videos/comidas.mov')}}">
    <!--<source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">-->
@endsection
@section('Services')
    <section class="Images row center">
        <a href="{{url('/alimentos')}}">
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
@endsection

@section('Header')
    <div class="arrow right">
        <a href="{{url('mascotas')}}">
            <figure class="Service-image">
                <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
            </figure>
        </a>
        <a href="{{url('servicios-generales')}}">
            <figure class="Service-image">
                <img src="{{asset('img/oficios.svg')}}" alt="oficios">
            </figure>
        </a>
    </div>
    <form class="Form row center col-8" method="GET" action="{{route('platform', 'comidas')}}">
        <label for="place" class="col-4">
            <div id="locationField">
                <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text">
            </div>
        </label>
        <label for="food_type" class="col-4">
            <select class="js-example-basic-single" id="food_type" name="food_type">
                <option value="" selected>Tipo de comida</option>
                @foreach($foods as $food)
                    <option value="{{$food->id}}">{{$food->name}}</option>
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
    <section class="HowItWorks">
        <img src="{{url('img/cocina_how.svg')}}" alt="">
    </section>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $('#date').daterangepicker(getConfig('single'),
                function(start, end, label) {
                    console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                }
        );
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection