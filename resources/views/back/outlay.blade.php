@extends('layoutBack')

@section('content')

    @include('back.partial.menuAdmin')
    <h1>Desembolsos</h1>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <table class="Table rwd-table" id="tableUsers" data-route="{{asset('uploads/provider')}}">
        <tr class="header-table">
            <th>Usuario</th>
            <th>Email</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        @foreach($outlays as $outlay)
        <tr style="text-align: center; padding:5px">
            <td>{{$outlay->provider->user->name . ' ' . $outlay->provider->user->last_name}}</td>
            <td>{{$outlay->provider->user->email}}</td>
            <td>${{number_format($outlay->value, 0, '.', '.')}}</td>
            <td class="center">
                <a href="#" action="{{route('updateOutlateState', $outlay->id)}}" class="updateOutlateState" style="background: #002444;padding: 0.375rem 0.75rem; color: white">Desembolsar</a>
            </td>
        </tr>
        @endforeach
    </table>
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
                        alert(data);
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