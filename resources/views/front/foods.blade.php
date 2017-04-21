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
        <label for="place" class="col-4 small-12 medium-4 Form-Control small center">
            <span id="PlaceIcon" class="icon" style="cursor:pointer">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 485.211 485.21">
                    <g fill="#AAA">
                        <path d="M198.008,313.767l11.252,28.138c-10.897,4.354-21.765,7.672-32.368,9.89l-6.191-29.669 C179.587,320.253,188.767,317.444,198.008,313.767z M107.77,350.109c11.105,3.197,22.806,4.915,34.768,5.092l0.476-30.322 c-9.301-0.153-18.333-1.451-26.861-3.906L107.77,350.109z M346.552,297.184c8.741,1.723,17.268,4.714,25.352,8.887l13.927-26.948 c-10.665-5.479-21.889-9.418-33.412-11.672L346.552,297.184z M283.294,272.309l9.068,28.903c9.264-2.903,18.421-4.737,27.241-5.447 l-2.422-30.209C306.102,266.447,294.7,268.729,283.294,272.309z M234.611,295.113c-3.404,2.133-6.753,4.083-10.041,5.922 l14.75,26.481c3.701-2.082,7.491-4.266,11.28-6.637c5.214-3.229,10.31-6.104,15.313-8.653l-13.773-27.004 C246.457,288.125,240.59,291.412,234.611,295.113z M318.423,106.14c0,12.379-2.968,24.107-8.237,34.415l-67.579,132.374 c0,0-68.114-133.474-68.38-134.033c-4.77-9.892-7.432-21.028-7.432-32.756c0-41.875,33.937-75.814,75.812-75.814 C284.479,30.326,318.423,64.265,318.423,106.14z M288.097,106.14c0-25.114-20.377-45.49-45.49-45.49 c-25.114,0-45.49,20.376-45.49,45.49c0,25.111,20.376,45.487,45.49,45.487C267.72,151.627,288.097,131.251,288.097,106.14z M394.235,181.954h-71.131l-15.495,30.327h64.77l32.726,98.205l-10.454,11.551c11.136,10.062,16.909,19.336,16.941,19.368 l3.197-1.923l28.343,85.076H42.053l30.387-91.063c1.066,0.741,1.893,1.451,3.078,2.188l16.113-25.646 c-3.614-2.282-6.576-4.532-9.183-6.632l30.388-91.125h64.795c-6.427-12.559-11.491-22.477-15.488-30.327H90.978L0,454.885h485.211 L394.235,181.954z"/>
                    </g>
                </svg>
            </span>
            <input id="autocomplete" name="place" type="text" placeholder="Lugar" value="{{old('place')}}">
            <input class="field" id="lat" name="lat" type="hidden" value="{{old('lat')}}">
            <input class="field" id="lng" name="lng" type="hidden" value="{{old('lng')}}">
            <input class="field" id="typeService" name="typeService" type="hidden" value="food">
        </label>
        <label for="food_type" class="col-4 small-12 medium-4 Form-Control small center">
            <span class="icon"><img src="{{asset('img/icons/food.svg')}}" alt="food"></span>
            <span style="height:42px" class="name">Servicio</span>
            <select class="js-example-basic-multiple" id="food_type" name="service_type[]" multiple>
                @foreach($foods as $food)
                    <option value="{{$food->id}}">{{$food->name}}</option>
                @endforeach
            </select>
        </label>
        <label for="date" class="col-4 medium-4 small-12 Form-Control">
            <span class="icon"><img src="{{asset('img/icons/calendar.svg')}}" alt="calendar"></span>
            <input class="datetimepicker_mask" id="date" name="date" type="text" placeholder="Fecha" autocomplete="off"  readonly="true" value="{{old('date')}}">
        </label>
        <button class="Button">Buscar</button>
    </form>
@endsection

@section('content')
    <section class="HowItWorks">
    <span class="how_title">¿Cómo funciona?</span>
        <div>
        <img src="{{url('img/cocina_how.svg')}}" alt="">
         </div>
        <div style="clear:both;"></div>
        <div class="div_box_center">
            <a id="playVideo" class="btn_blue" href="#">VER VIDEO</a>
        </div>
    </section>
    <section class="Alert Video">
        <article class="Message" style="width:800px">
            <h2>Bienvenido a City Consumo</h2>
            <div class="Video-child">
                <video id="videoCorp" class="cover" width="100%" height="auto" controls>
                    <source src="{{url('videos/corporativo.mp4')}}">
                </video>
                <!--<span class="play"><img src="{{url('img/icons/play.svg')}}" alt="play"></span>
                <span class="stop"><img src="{{url('img/icons/pause.svg')}}" alt="pause"></span>-->
            </div>
            <a href="#" class="close">Cerrar</a>
        </article>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $(".js-example-basic-multiple").select2({width: '100%'});

        var $date = $('#date');
        $date.daterangepicker(getConfig('multiple'));
        $date.on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        var video = document.getElementById("videoCorp");

        $('#playVideo').on('click', function(){
            $('.Alert.Video').attr('id' ,'Flex');
            video.play();
        });

        $('.Alert.Video .close').on('click', function(){
            $('.Alert.Video').attr('id' ,'');
            video.pause();
        });
    </script>
    <script src="{{asset('js/address.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
    <style>
        span.select2-selection.select2-selection--multiple {
            height: 42px !important;
        }
    </style>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection