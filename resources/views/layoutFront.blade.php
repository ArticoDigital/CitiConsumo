<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <link rel="stylesheet" href="{{asset('css/front/style.css')}}">
    @yield('styles')
</head>
<body>
    <header class="Header Container">
        <div class="BarNav row middle between">
            <figure class="Logo">
                <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
            <nav class="row">
                <ul class="Socials">
                    <li class="icon"><a href="#">T</a></li>
                    <li class="icon"><a href="#">I</a></li>
                    <li class="icon"><a href="#">F</a></li>
                </ul>
                <ul class="Menu row between">
                    <li><a href="">Postula tu servicio</a></li>
                    <li><a href="">Registrate</a></li>
                    <li><a href="">Entrar</a></li>
                    <li class="icon"><a href="#">M</a></li>
                </ul>
            </nav>
        </div>
        <section class="Services">
            <section class="Images row center">
                <figure class="Service-image">
                    <img src="{{asset('img/mascotas.svg')}}" alt="mascotas">
                    <figcaption>Mascotas</figcaption>
                </figure>
                <figure class="Service-image">
                    <img src="{{asset('img/oficios.svg')}}" alt="oficios">
                    <figcaption>Oficios</figcaption>
                </figure>
                <figure class="Service-image">
                    <img src="{{asset('img/comidas.svg')}}" alt="comidas">
                    <figcaption>Comidas</figcaption>
                </figure>
            </section>
            <article class="Leyend"><q>Innovando la forma en como consumimos</q></article>
            <div class="Arrow"><a href="#"> > </a></div>
        </section>
        <div class="backgroundVideo">
            <img src="{{asset('img/background.png')}}" alt="video">
            <!--<video src="" class="VideoBackground" loop>
                 <source src="{asset('video1.mp4')}}" type="video/mp4">
                  <source src="{asset('video1.ogg')}}" type="video/ogg">
                  Por favor actualice su navegador
            </video>-->
        </div>
    </header>
    @yield('content')
    <footer class="Footer">

    </footer>
    @yield('scripts')
</body>
</html>