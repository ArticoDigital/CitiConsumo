@extends('layoutAuth')

@section('action')
    <li><a href="{{route('register')}}">Registrate</a></li>
@endsection


@section('content')

    <form style="min-width: 360px; max-width: 500px; margin: 0px auto; padding: 10px 30px; background-color: white; border-radius: 10px;"
          class="row Form-register" role="form" method="POST" action="{{route('postEmail')}}">
        @if(Session::has('status'))
            <h4 class="col-12 bottom-element">
                {{Session::get('status')}}
            </h4>
        @else

            <h4 class="col-12 bottom-element">
                <b>Escribe tu correo electrónico para recuperar la contraseña</b>
            </h4>
            <div class="col-6 offset-4 offset-small-0 small-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="email" class="row middle">

                    {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                    <span class="col-5">Correo:</span>
                    <input class="col-7" id="email" type="email" name="email" value="{{ old('email') }}">

                </label>
                <div class="row col-12 end ">
                    <button class="button">Restaurar</button>
                </div>
            </div>
        @endif
    </form>


@endsection

@section('scripts')
    <script>
        $('#preloader').addClass('hide');
        $('body').css('overflow', 'visible');

        $('.Hamburguer').click(function () {
            $(this).toggleClass('open');
            $(this).siblings().toggleClass('show');
            if ($(this).hasClass('open'))
                $('body').css('overflow', 'hidden');
            else
                $('body').css('overflow', 'visible');
        });
    </script>
@endsection

