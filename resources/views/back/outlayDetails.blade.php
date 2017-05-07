@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Detalles de Desembolso</h1>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <table class="Table rwd-table" id="tableUsers" data-route="{{asset('uploads/provider')}}">
        <tr class="header-table">
            <th>Id Desembolso</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Total</th>
            <th>Estado de desembolso</th>
            <th>Acciones</th>
        </tr>
        
        <tr style="text-align: center; padding:5px">
            <td>{{$outlay->id }}</td>
            <td>{{$outlay->provider->user->name . ' ' . $outlay->provider->user->last_name}}</td>
            <td>{{$outlay->provider->user->email}}</td>
            <td>${{number_format($outlay->value, 0, '.', '.')}}</td>
            <td>@if($outlay->isPayed==2)
                        Desembolsado
                    @else
                        No desembolsado
                    @endif
                    </td>
            <td class="center">
                @if($outlay->isPayed != 2)
                <a href="#" action="{{route('updateOutlateState', $outlay->id)}}" class="updateOutlateState" style="background: #002444;padding: 0.375rem 0.75rem; color: white">Desembolsar</a>

                 @endif
            </td>
        </tr>

    </table>
    <article class="TabContainer" id="EditProduct">
        <table class="rwd-table" style="text-align: center; margin-top:10px">
            <tr class="header-table">
                <th>ID compra</th>
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Valor</th>
                <th>Proveedor</th>
                <th>Cliente</th>
                <th>Estado de compra</th>
                <th>Acciones</th>
            </tr>
            @foreach($buys as $buy)
                <tr>
                    <td>{{$buy->zp_ticket_id}}</td>
                    <td>{{$buy->created_at->diffForHumans()}}</td>
                    <td>{{$buy->service->serviceType->name}}</td>
                    <td>${{$buy->value}}</td>
                    <td>{{$buy->service->provider->user->name}}</td>
                    <td>{{$buy->user->name}}</td>
                    <td>@if($buy->state_id==3)
                        desembolsado a proveedor
                    @elseif($buy->state_id==2)
                        Aprobado
                    @elseif($buy->state_id==1)
                        Rechazado
                    @endif
                    </td>
                    <td><a class="" target="blank"  href="{{route('serviceDetailClient',['id' => $buy->id])}}">Ver detalles</a></td>
                </tr>
            @endforeach
        </table>
    </article>
@endsection

@section('scripts')
    <script src="{{asset('js/users.js')}}"></script>
    <script>
        $('.updateOutlateState').on('click', function(){
            if(confirm('¿Está seguro que desea desembolsar?')){
                var param = {
                    '_token' : $('#token').val(),
                    'url' : $(this).attr('action')
                };

                $.ajax({
                    type : 'POST',
                    data: param,
                    url : param.url,
                    success : function(data){
                        console.log(data);
                        alert(data.message);
                            location.reload();
                    },
                    error : function(error){
                        console.log(error);
                        alert('Hubo un error al desembolsar. Vuelva a intentarlo.');
                    }
                });
            }
        });
    </script>
@endsection

@section('styles')
    <style>.Table td{ padding-bottom: 20px !important}</style>
@endsection