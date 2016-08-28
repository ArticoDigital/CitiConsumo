@extends('layoutAuth')

@section('action')
    <li><a href="{{route('register')}}">Registrate</a></li>
@endsection


@section('content')


<form style="min-width: 360px; max-width: 500px; margin: 0px auto; padding: 10px 30px; background-color: white; border-radius: 10px;" class="row Form-register" role="form" method="POST" action="{{route('postReset')}}">
        <h2 class="col-8 small-12  bottom-element">
            <b>Restaurar contraseña</b>
        </h2>
        <div id="resetpassword" class="col-8 offset-4 offset-small-0 small-12">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">
            <label for="email" class="row middle">
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                <span class="col-5 medium-5 small-12">email:</span>
                <input class="col-7 medium-7 small-12" id="email" type="email" name="email" value="{{ old('email') }}">
            </label>
            <label for="password" class="row middle">
                {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                <span class="col-5 medium-5 small-12">Contraseña:</span>
                <input class="col-7 medium-7 small-12" name="password" id="password" type="password">
            </label>
            <label for="password_confirmation" class="row middle">
                <span class="col-5 medium-5 small-12">Confirmar contraseña:</span>
                <input class="col-7 medium-7 small-12" name="password_confirmation" id="password_confirmation" type="password">
            </label>
            <div class="row col-12 end ">
                <button class="button">Restaurar</button>
            </div>
        </div>
    </form>



@endsection

@section('scripts')
    <script>
        $('#preloader').addClass('hide');
        $('body').css('overflow', 'visible');

        $('.Hamburguer').click(function(){
            $(this).toggleClass('open');
            $(this).siblings().toggleClass('show');
            if($(this).hasClass('open'))
                $('body').css('overflow', 'hidden');
            else
                $('body').css('overflow', 'visible');
        });
    </script>
@endsection

