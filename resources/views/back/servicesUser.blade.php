@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Productos de {{$provider->user->name}}</h1>
    <table class="rwd-table">
        <tr class="header-table">
            <th>Tipo de servicio</th>
            <th>Precio</th>
            <th>Locación</th>
            <th>Fecha registro</th>
            <th>Activo</th>
            <th>Validado</th>
            <th>Detalle</th>
        </tr>
        @foreach($provider->services as $service)
            <tr>
                <td>{{$service->serviceType->kindServices->name}} - {{$service->serviceType->name}}</td>
                <td class="center">{{$service->price}}</td>
                <td >{{$service->location}}</td>
                <td >{{$service->created_at}}</td>
                <td class="center">{{($service->isActive)?"Si":"No"}}</td>
                <td class="center">{{($service->isValidate==1)?"Si":"No"}}</td>
                <td class="center"><a href="{{route('serviceDetail',['id' => $service->id])}}">Ver</a></td>
            </tr>


        @endforeach
    </table>
    <div class="preload hidden" id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@endsection

@section('scripts')
    <script src="{{asset('js/products.js')}}"></script>
    <script src="{{asset('js/users.js')}}"></script>
@endsection