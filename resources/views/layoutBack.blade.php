<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cityconsumo.com</title>
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
                    <li><a style="color: white" href="{{route('addService')}}" class="orange-text custom-invisible">Postula tu servicio</a></li>
                    @if(Auth::user()->role_id == 2)
                    <li><a style="color: white" href="{{route('tradeList')}}" class="orange-text">Mis transacciones</a></li>
                    @endif
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
<footer class="Footer row middle center">
    <section class="row center middle col-5 medium-5 small-5">
        <figure class="Logo col-6 small-6" style="margin-top: 20px">
            <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
        </figure>
        <nav class="col-12  small-12 medium-12 self-end menu-item-out-movile">
            <ul class="Menu-footer row center no-padding">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('whoweare')}}">Nosotros</a></li>
                <li><a href="{{route('faq')}}">Preguntas frecuentes</a></li>
                <li><a href="{{route('testimony')}}">Testimonios</a></li>
                <li><a href="{{route('contact')}}">Contacto</a></li>
            </ul>
        </nav>
    </section>
    <section class="row col-7 medium-7 small-7 middle">
        <nav class="col-10 small-8  medium-10">
            <ul class="no-padding Menu row menu-item-out-movile" style="font-size: .77rem;">
                <li><a href="{{route('documents')}}">DOCUMENTACIÓN</a></li>
                <li><a href="{{route('terms')}}">TERMINOS Y CONDICIONES</a></li>
                <li>COPYRIGHT</li>
            </ul>
        </nav>
        <nav class="col-2 small-2 end">
            <ul class="Socials">
                <li class="icon">
                    <a href="https://www.instagram.com/cityconsumo/" target="_blank">
                        <img src="{{asset('img/instagram.svg')}}" alt="instagram">
                    </a>
                </li>
                <li class="icon">
                    <a href="https://www.facebook.com/City-Consumo-1269145086448897/" target="_blank">
                        <img src="{{asset('img/facebook.svg')}}" alt="facebook">
                    </a>
                </li>
                <li class="icon">
                    <a href="mailto:info@cityconsumo.com">
                        <img src="{{asset('img/letter.svg')}}">
                    </a>
                </li>
            </ul>
        </nav>
        <div class="Copy col-12 small-12 medium-12 row end self-end">
            <p>2016 - Cityconsumo | Diseño Web &amp; posicionamiento SEO por Mouse Interactivo</p>
        </div>
    </section>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>