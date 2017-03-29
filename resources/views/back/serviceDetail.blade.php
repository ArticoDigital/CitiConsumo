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
                <li class="col-12"><b>Activo:</b> {{$service->isActive}}</li>
                <li class="col-12"><b>Tipo:</b> {{$service->serviceType->name}}</li>
                <li class="col-12"><b>Fecha de creación:</b> {{$service->created_at}}</li>
                <li class="col-12"><b>Rango de atención:</b> Desde:{{$service->date_start}} Hasta: {{$service->date_end}}</li>
                <li class="col-12"><b>Horario de atención:</b> Desde:{{$service->hour1}} Hasta: {{$service->hour2}}</li>
                <li class="col-12"><b>Precio:</b> ${{$service->price}} X {{$service->rate_type}}</li>
                <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
            </ul>
        @endif
        @if($service->food)
            <ul class="col-12 row">
                <li class="col-12"><b>Tipo:</b> {{$service->serviceType->name}}</li>
                <li class="col-12"><b>Fecha:</b> {{$service->food->food_time}}</li>
                <li class="col-12"><b>Precio:</b> ${{$service->price}}</li>
                <li class="col-12"><b>Platos disponibles:</b> {{$service->food['foods-quantity']}}</li>
                <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
            </ul>
        @endif
        <h3 class="col-12 small-12">Descripción: </h3>
        <p>{{$service->description}}</p>
        <p>Agrega al servicio: {{$service->service_addition}}</p>
    </section>
@endsection