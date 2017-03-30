@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Servicios eliminados</h1>
    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
    <table class="rwd-table" id="reload">
        <tr class="header-table">
            <th>Editar</th>
            <th>Usuario</th>
            <th>Tipo de servicio</th>
            <th>Precio</th>
            <th>Detalles</th>
            <th>Fecha resgistro</th>
            <th>Activar</th>
        </tr>
        @foreach($services as $service)

            <tr>
                <td data-th="Actions" class="row">
                    <img class="small-icon-product" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                </td>
                <td class="center"><a target="_blank" href="{{route('profile', $service->provider->user->id)}}">{{$service->provider->user->email}}</a></td>
                <td class="center">{{$service->serviceType->kindServices->name}} - {{$service->serviceType->name}}</td>

                <td class="center">${{$service->price}}</td>
                <td class="center">
                    <a target="_blank"  href="{{route('serviceDetail',['id' => $service->id])}}">VER</a>
                </td>
                <td class="center">{{$service->created_at}}</td>
                <td class="center">
                    <a href="#" data-value="0" data-action="{{route('deleteProductProvider', $service->id)}}" class="Admin-updateStateProvider" id="activeProduct">Activar</a>
                   
                </td>
            </tr>
        @endforeach
    </table>
    <div class="preload hidden" id="loader-wrapper">
        <div id="loader"></div>
    </div>
    {{ $services->render() }}
@endsection

@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
@endsection