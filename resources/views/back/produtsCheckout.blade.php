@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Productos por aprobar</h1>
    <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
    <table class="rwd-table">
        <tr class="header-table">
            <th>Editar</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Detalles</th>
            <th>Activar/Eliminar</th>
        </tr>
        @foreach($services as $service)
            <tr>
                <td data-th="Actions" class="row">
                    <img class="small-icon-product" src="{{url('img/lapiz-edicion.svg')}}" alt="">
                </td>
                <td class="center">{{$service->name}}</td>
                <td class="center">${{number_format($service->price, 0, '.', '.')}}</td>
                <td class="center">
                    <a href="#">VER</a>
                </td>
                <td class="center">
                    <a href="#" data-value="0" data-action="{{route('deleteProductProvider', $service->id)}}" class="Admin-updateStateProvider" id="activeProduct">Activar</a>
                    <a href="#" data-value="1" data-action="{{route('deleteProductProvider', $service->id)}}" class="Admin-updateStateProvider" id="deleteProduct">Eliminar</a>
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
    <script>
        $('.Admin-updateStateProvider').on('click', function(){
            var r = confirm("¿Esta seguro de eliminar este producto?");
            if(r){
                var param = {
                    '_token' : $('#token').val(),
                    'action' : $(this).attr('data-action'),
                    'value'  : $(this).attr('data-value')
                };

                $.ajax({
                    method: 'POST',
                    url: param.action,
                    dataType: 'json',
                    data : param,
                    success: function(data){
                        alert(data.message);
                    },
                    error: function(){
                        console.log('Hubo un error en la consulta por ajax');
                    }
                });
            }
        });
    </script>
@endsection