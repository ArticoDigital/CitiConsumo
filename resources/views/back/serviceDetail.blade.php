@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>{{$service->serviceType->name}} </h1>
    <section class="row between">
        @foreach($service->serviceFiles as $file)
            @if($file->kind_file=="imagen")
            <figure class="col-3 small-12 " style="margin: 0">
                <img src="{{asset('uploads/products/'.$file->name)}}" alt="">
            </figure>
            @endif
        @endforeach

        
            <div class="col-12 row">
                <ul class="col-6">
                    
                    <li class="col-12"><b>Tipo de servicio:</b>{{$service->serviceType->kindServices->name}} - {{$service->serviceType->name}}</li>

                    <li class="col-12"><b>Activo:</b> {{$service->isActive?'Si':'No'}}</li>
                    <li class="col-12"><b>Validado:</b> {{$service->isValidate == 1?'Si':'No'}} {{$service->isValidate == 2?'- Eliminado':''}} {{$service->isValidate == 3?'- Eliminado con dehabilitación de proveedor':''}}</li>
                    <li class="col-12"><b>Experiencia:</b> {{$service->experienceType->name}}</li>
                    <li class="col-12"><b>Certificados de experiencia: </b> 
                        @foreach($service->serviceFiles as $file)
                        @if($file->kind_file=="certificado")
                            
                              
                            <a href="{{asset('uploads/products/'.$file->name)}}" target="blank">
                                <img style="width: 30px; margin-left: 10px;" src="{{asset('img/file.png')}}" alt="archivo"></a>
                                
                            
                        @endif
                        @endforeach
                    </li>
                    <li class="col-12"><b>Tipo:</b> {{$service->serviceType->name}}</li>
                    <li class="col-12"><b>Fecha de creación:</b> {{$service->created_at}}</li>
                    <li class="col-12"><b>Última actualización:</b> {{$service->updated_at}}</li>
                    <li class="col-12"><b>Rango de atención:</b> Desde:{{$service->date_start}} Hasta: {{$service->date_end}}</li>
                    <li class="col-12"><b>Horario de atención:</b> Desde:{{$service->hour1}} Hasta: {{$service->hour2}}</li>
                    <li class="col-12"><b>Respuesta inmediata:</b> {{$service->inmediate_response?'Si':'No'}}</li>
                    @if(!$service->inmediate_response)
                    <li class="col-12"><b>Tiempo de Respuesta:</b> {{$service->responseType->name}}</li>
                    @endif
                    <li class="col-12"><b>Precio:</b> ${{$service->price}} X {{$service->rate_type}}</li>
                    <li class="col-12"><b>Locación: </b>{{$service->location}}</li>
                    
                    
                </ul>
                @if($service->pet)
                <ul class="col-6 ">
                    <li class="col-12"><b>Tamaños cuidados: </b>  
                        @foreach($service->pet->sizes as $size)
                            {{$size->name}}-
                        @endforeach</li>
                    <li class="col-12"><b>Cachorro: </b>{{$service->pet->puppy?'Si':'No'}}</li>
                    <li class="col-12"><b>Adulto: </b>{{$service->pet->adult?'Si':'No'}}</li>
                    <li class="col-12"><b>Adulto Mayor: </b>{{$service->pet->elderly?'Si':'No'}}</li>
                    <li class="col-12"><b>Zona libre de humo: </b>{{$service->pet->smoke_free?'Si':'No'}}</li>
                    <li class="col-12"><b>Servicio a domicilio: </b>{{$service->pet->home_service?'Si':'No'}}</li>
                    </ul>
                @endif
            </div>
       
        <h3 class="col-12 small-12">Descripción: </h3>
        <p>@php
        echo nl2br("$service->description");
        @endphp</p>
        <p>Agrega al servicio: {{$service->service_addition}}</p>
    </section>
@endsection