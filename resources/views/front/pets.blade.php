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
                        <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
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
            <input id="date" name="date" type="text" placeholder="Fecha de Hospedaje">
        </label>
        <label for="size" class="col-3">
            <input id="size" name="size" type="text" placeholder="Tamaño">
        </label>
        <label for="breed" class="col-3">
            <select class="js-example-basic-single" id="breed" name="breed">
                <option value="" selected>Seleccione una Raza</option>
            </select>
        </label>
        <button class="Button yellow" style="margin: 65px 0">Buscar</button>
    </form>
@endsection

@section('content')
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".js-example-basic-single").select2({width: '100%'});
        $selectBox = $('.select2-container--default .select2-selection--single');
        $selectBox.css('height', '40px').eq(0).css('padding-top', '5px');
        $selectBox.children('.select2-selection__arrow').css('height', '100%');
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection