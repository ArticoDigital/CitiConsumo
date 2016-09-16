@extends('layoutFront')

@section('Video')
    <source src="{{url('videos/mascotas.mov')}}">
@endsection

@section('Services')
    <section class="Images row center">
        <a href="{{url('mascotas')}}">
            <figure class="Service-image">
                <div class="circle">
                    <div class="front">
                        <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
                    </div>
                    <div class="back">
                        <img src="{{asset('img/blue.svg')}}" alt="azul">
                        <span>Encuentra alguien que cuide de tu mascota!</span>
                    </div>
                </div>
                <figcaption>Mascotas</figcaption>
            </figure>
        </a>
    </section>
@endsection

@section('Header')
    <div class="arrow right" href="{{url('mascotas')}}">
        <a href="{{url('servicios-generales')}}">
            <figure class="Service-image">
                <img src="{{asset('img/oficios.svg')}}" alt="Oficios">
            </figure>
        </a>
        <a href="{{url('alimentos')}}">
            <figure class="Service-image">
                <img src="{{asset('img/comidas.svg')}}" alt="mascotas">
            </figure>
        </a>
    </div>

    <form class="Form withAddress row center col-9" method="GET" action="{{route('platform', 'mascotas')}}">
        <label for="place" class="col-3 medium-3 small-12 Form-Control">
            <span class="icon"><img src="{{asset('img/icons/place.svg')}}" alt="place"></span>
            <input id="autocomplete" name="place" type="text" placeholder="Lugar" value="{{old('place')}}">
            <input class="field" id="lat" name="lat" type="hidden" value="{{old('lat')}}">
            <input class="field" id="lng" name="lng" type="hidden" value="{{old('lng')}}">
            <input class="field" id="typeService" name="typeService" type="hidden" value="pet">
        </label>
        <label for="date" class="col-3 medium-3 small-12 Form-Control">
            <span class="icon"><img src="{{asset('img/icons/calendar.svg')}}" alt="calendar"></span>
            <input class="datetimepicker_mask" id="date" name="date" type="text" placeholder="Fecha" autocomplete="off" value="{{old('date')}}">
        </label>
        <label for="size" class="col-3 medium-3 small-6 Form-Control">
            <span class="icon"><img src="{{asset('img/icons/dog.svg')}}" alt="dog"></span>
            <select class="js-example-basic-single" id="size" name="size">
                <option value="" selected>Tamaño</option>
                <option value="1">Pequeño</option>
                <option value="2">Mediano</option>
                <option value="3">Grande</option>
            </select>
        </label>
        <label for="breed" class="col-3 medium-3 small-6 Form-Control">
            <span class="icon"><img src="{{asset('img/icons/footprint.svg')}}" alt="footprint"></span>
            <select class="js-example-basic-single" id="breed" name="breed">
                <option value="" selected>Raza</option>
                @foreach($breeds as $breed)
                    <option value="{{$breed->id}}">{{$breed->name}}</option>
                @endforeach
            </select>
        </label>
        <button class="Button yellow">Buscar</button>
    </form>
@endsection

@section('content')
    <section class="HowItWorks">
    <span class="how_title">¿Cómo funciona?</span>
        <div>
        <img src="{{url('img/mascotas_how.svg')}}" alt="">
         </div>
        <div style="clear:both;"></div>
        <div class="div_box_center">
            <a class="btn_blue" href="#">VER VIDEO</a>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script>
        $(".js-example-basic-single").select2({width: '100%'});

        var $date = $('#date');
        $date.daterangepicker(getConfig('multiple'));
        $date.on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    </script>
    <script src="{{asset('js/address.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection