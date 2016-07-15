@extends('layoutFront')

@section('Video')
    <source src="{{url('videos/mascotas.mov')}}">
@endsection

@section('Header')
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
    <form class="Form row center col-9">
        <label for="place" class="col-3">
            <input id="place" name="place" type="text" placeholder="Lugar">
        </label>
        <label for="date" class="col-3">
            <input class="datetimepicker_mask" id="date" name="date" type="text" placeholder="Fecha Hospedaje">
        </label>
        <label for="size" class="col-3">
            <select class="js-example-basic-single" id="breed" name="breed">
                <option value="" selected>Tamaño</option>
                <option value="1" selected>Pequeño</option>
                <option value="2" selected>Mediano</option>
                <option value="3" selected>Grande</option>
            </select>
        </label>
        <label for="breed" class="col-3">
            <select class="js-example-basic-single" id="breed" name="breed">
                <option value="" selected>Raza</option>
                @foreach($breeds as $breed)
                    <option value="{{$breed->id}}">{{$breed->name}}</option>
                @endforeach
            </select>
        </label>
        <button class="Button yellow" style="margin: 65px 0">Buscar</button>
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