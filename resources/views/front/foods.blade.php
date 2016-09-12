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
            <span class="icon"><img src="{{asset('img/icons/place.svg')}}" alt="place"></span>
            <input id="autocomplete" name="place" type="text" placeholder="Lugar" value="{{old('place')}}">
            <input class="field" id="lat" name="lat" type="hidden" value="{{old('lat')}}">
            <input class="field" id="lng" name="lng" type="hidden" value="{{old('lng')}}">
            <input class="field" id="typeService" name="typeService" type="hidden" value="food">
        </label>
        <label for="food_type" class="col-4 small-6 medium-4 Form-Control small center">
            <span class="icon"><img src="{{asset('img/icons/food.svg')}}" alt="food"></span>
            <span class="name">Tipo de Comida</span>
            <select class="js-example-basic-multiple" id="food_type" name="food_type[]" multiple>
                @foreach($foods as $food)
                    <option value="{{$food->id}}">{{$food->name}}</option>
                @endforeach
            </select>
        </label>
        <label for="date" class="col-4 small-6 medium-4 Form-Control small center">
            <span class="icon"><img src="{{asset('img/icons/calendar.svg')}}" alt="calendar"></span>
            <input class="datetimepicker_mask" id="date" name="date" type="text" placeholder="Fecha" autocomplete="off" value="{{old('date')}}">
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
        $date.daterangepicker(getConfig('single'));
        $date.on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY'));
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
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection