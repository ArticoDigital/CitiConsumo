<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <link rel="stylesheet" href="{{asset('front/style.css')}}">
    @yield('styles')
</head>
<body>
    <header class="Header">
        <video src="" class="VideoBackground" loop>
           <source src="{{asset('video1.mp4')}}" type="video/mp4">
            <source src="{{asset('video1.ogg')}}" type="video/ogg">
            Por favor actualice su navegador
        </video>
        <div class="Container">
            <figure class="Logo">
                <img src="" alt="cityconsumo">
            </figure>
            <nav>
                <ul class="Socials">
                    <li><a href="">Icono twitter</a></li>
                    <li><a href="">Icono instagram</a></li>
                    <li><a href="">Icono facebook</a></li>
                </ul>
                <ul class="Menu">
                    <li><a href="">Postula tu servicio</a></li>
                    <li><a href="">Registrate</a></li>
                    <li><a href="">Entrar</a></li>
                    <li><a href="">Icono Menu</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    @yield('scripts')
</body>
</html>