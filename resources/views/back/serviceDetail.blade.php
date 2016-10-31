@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>{{$service->name}} </h1>
    <section class="row between">
        @foreach($service->serviceFiles as $file)
            <figure class="col-3 small-12 " style="margin: 0">
                <img src="{{asset('uploads/products/'.$file->name)}}" alt="">
            </figure>
        @endforeach

        @if($service->pet)
            <div class="col-12">
                <ul class="col-12 row">
                    <li class="col-12"><b>Fecha:</b> {{$service->pet->date_start}} a {{$service->pet->date_end}}</li>
                    <li class="col-12"><b>Tamaño mascota: </b> {{$service->pet->petSizes->name}}</li>
                    <li class="col-12"><b>Precio por mascota:</b> ${{$service->price}}</li>
                    <li class="col-12"><b>Cantidad de mascotas: </b> {{$service->pet->pets_quantity}}</li>
                    <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
                </ul>
            </div>
        @endif
        @if($service->general)
            <ul class="col-12 row">
                <li class="col-12"><b>Tipo:</b> {{$service->general->generalType->name}}</li>
                <li class="col-12"><b>Fecha de creación:</b> {{$service->general->date}}</li>
                <li class="col-12"><b>Precio por hora:</b> ${{$service->price}}</li>
                <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
            </ul>
        @endif
        @if($service->food)
            <ul class="col-12 row">
                <li class="col-12"><b>Tipo:</b> {{$service->food->foodTypes->name}}</li>
                <li class="col-12"><b>Fecha:</b> {{$service->food->food_time}}</li>
                <li class="col-12"><b>Precio:</b> ${{$service->price}}</li>
                <li class="col-12"><b>Platos disponibles:</b> {{$service->food['foods-quantity']}}</li>
                <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
            </ul>
        @endif
        <h3 class="col-12 small-12">Descripción </h3>
        <p>{{$service->description}}</p>
    </section>
@endsection