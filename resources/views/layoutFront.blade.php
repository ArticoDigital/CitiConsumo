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
            <figure class="Logo col-2">
                <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
            <nav class="row col-10 end">
                <ul class="Socials row no-padding">
                    <li class="icon">
                        <a href="https://twitter.com/city_consumo">
                            <img src="{{asset('img/twitter.svg')}}" alt="twitter">
                        </a>
                    </li>
                    <li class="icon">
                        <a href="#">
                            <img src="{{asset('img/instagram.svg')}}" alt="instagram">
                        </a>
                    </li>
                    <li class="icon">
                        <a href="https://www.facebook.com/City-Consumo-1269145086448897/">
                            <img src="{{asset('img/facebook.svg')}}" alt="menu">
                        </a>
                    </li>
                </ul>
                <ul class="Menu row between">
                    <li><a href="">Postula tu servicio</a></li>
                    <li><a href="">Registrate</a></li>
                    <li><a href="">Entrar</a></li>
                    <li class="icon">
                        <a href="#">
                            <img src="{{asset('img/menu.svg')}}" alt="menu">
                        </a>
                    </li>
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
            <div class="Arrow"><a href="#"> <img src="{{asset('img/arrow.svg')}}" alt=""> </a></div>
        </section>
        <div class="backgroundVideo">
            <video class="cover" width="960" height="540" autoplay loop>
                <source src="http://cache.yoyodesign.com/media/137385/2014-09-08.mp4" type="video/mp4">
                <source src="http://cache.yoyodesign.com/media/137386/2014-09-08.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
            </video>
        </div>
    </header>
    @yield('content')
    <footer class="Footer row middle center">
        <section class="row center middle col-5">
            <figure class="Logo col-6" style="margin-top: 20px">
                <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
            <nav class="col-12 self-end">
                <ul class="Menu-footer row no-padding">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Testimonios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </section>
        <section class="row col-7 middle">
            <nav class="col-10">
                <ul class="no-padding Menu row" style="font-size: .77rem;">
                   <li><a href="#">DOCUMENTACIÓN</a></li>
                   <li><a href="#">TERMINOS Y CONDICIONES</a></li>
                   <li><a href="#">COPYRIGHT</a></li>
                </ul>
            </nav>
            <nav class="col-2 end">
                <ul class="Socials">
                    <li class="icon">
                        <a href="https://twitter.com/city_consumo">
                            <img src="{{asset('img/twitter.svg')}}" alt="twitter">
                        </a>
                    </li>
                    <li class="icon">
                        <a href="#">
                            <img src="{{asset('img/instagram.svg')}}" alt="instagram">
                        </a>
                    </li>
                    <li class="icon">
                        <a href="https://www.facebook.com/City-Consumo-1269145086448897/">
                            <img src="{{asset('img/facebook.svg')}}" alt="facebook">
                        </a>
                    </li>
                    <li class="icon">
                        <a href="https://www.facebook.com/City-Consumo-1269145086448897/">
                            <img src="{{asset('img/letter.svg')}}">
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="Copy col-12 row end self-end">
                <p>2016 - Cityconsumo | Diseño Web &amp; posicionamiento SEO por Mouse Interactivo</p>
            </div>
        </section>
    </footer>
    @yield('scripts')
</body>
</html>