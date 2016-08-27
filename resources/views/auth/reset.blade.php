@extends('layoutAuth')

@section('content')
    <form class="row Form-register" role="form" method="POST" action="{{route('postReset')}}">
        <h1 class="col-8 small-12  bottom-element">
            <b>RESTAURAR CONTRASEÑA</b>
        </h1>
        <div class="col-8 offset-4 offset-small-0 small-12">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">
            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5">email:</span>
                <input class="col-7" id="email" type="email" name="email" value="{{ old('email') }}">
            </label>
            <label for="password" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5">Contraseña:</span>
                <input class="col-7" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5">Confirmar contraseña:</span>
                <input class="col-7" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <div class="row col-12 end ">
                <button>RESTAURAR</button>
            </div>
        </div>
    </form>


@endsection

@section('scripts')
    
@endsection



