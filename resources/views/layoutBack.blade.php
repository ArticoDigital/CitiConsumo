<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <link rel="stylesheet" href="{{asset('css/back/style.css')}}">
    @yield('styles')
</head>
<body class="{{Request::route()->getName()}}">

<header class="Header">
    <div class="BarNav row middle between Container">
        <a href="{{url('/')}}" class="col-2">
            <figure class="Logo">
                <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
        </a>
        <nav class="row col-10 end">
            <ul class="Menu row between">
                <li><a href="{{route('profile')}}" style="color: white" >Bienvenid@ {{Auth::user()->name}}</a></li>
                <li>
                    <div class="Menu-fixed">
                        <a href="#" class="Hamburguer">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <nav>
                            <ul class="col-4">
                                <li><a href="#">QUIENES SOMOS?</a></li>
                                <li><a href="#">PREGUNTAS FRECUENTES </a></li>
                                <li><a href="#">AYUDANOS A MEJORAR</a></li>
                                <li><a href="#">CONTACTANOS</a></li>
                                <li><a href="#">TESTIMONIOS</a></li>
                            </ul>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<main class="Container">
@yield('content')
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
@yield('scripts')
</body>
</html>