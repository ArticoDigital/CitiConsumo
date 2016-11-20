<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/back/style.css')}}">
    @yield('styles')
</head>
<body class="{{Request::route()->getName()}}">

@if(session('alertTitle'))
    <section class="Alert">
        <article class="Message">
            <h2>{{session('alertTitle')}}</h2>
            {!! session('alertText') !!}
            <a href="#" class="close">Cerrar</a>
        </article>
    </section>
@endif
<header class="Header">
    <div class="BarNav row middle between Container">
        <a href="{{url('/')}}" class="col-2 small-2">
            <figure class="Logo">
                <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
        </a>
        <nav class="row col-10 end">
            <ul class="Menu row between">
                @if(Auth::user()->role_id == 3)
                    <li><a style="color: white" href="{{route('showClient')}}" class="orange-text">Usuarios</a></li>
                @else
                    <li><a style="color: white" href="{{route('addService')}}" class="orange-text">Postula tu servicio</a></li>
                    <li><a style="color: white" href="{{route('tradeList')}}" class="orange-text">Mis transacciones</a></li>
                @endif

                <li class="menu-item-out-movile"><a href="{{route('myProfile')}}" style="color: white">Bienvenid@ {{Auth::user()->name}}</a></li>
                <li class="menu-item-out-movile"><a href="{{route('logout')}}" style="color: white">Cerrar sesión</a></li>
                <li>
                    <div class="Menu-fixed">
                        <a href="#" class="Hamburguer">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <nav>
                            <ul class="col-4">
                                <li><a href="{{route('myProfile')}}">MI PERFIL</a></li>
                                <li><a href="{{route('faq')}}">PREGUNTAS FRECUENTES </a></li>
                                <!--<li><a href="{{route('contact')}}">AYUDANOS A MEJORAR</a></li>-->
                                <li><a href="{{route('contact')}}">CONTACTANOS</a></li>
                                <li class="menu-item-out"><a href="{{route('logout')}}" style="color: white">CERRAR SESIÓN</a></li>
                            </ul>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="Container">
    <main class="MainBack">
        @yield('content')
    </main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>