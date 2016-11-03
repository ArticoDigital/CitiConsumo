<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/front/style.css')}}">
    @yield('styles')

</head>
<body class="{{Request::route()->getName()}}">
  
@yield('content')
<footer class="Footer row middle center">
    <section class="row center middle col-5 medium-5 small-5">
        <figure class="Logo col-6 small-6" style="margin-top: 20px">
            <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
        </figure>
        
    </section>
    <section class="row col-7 medium-7 small-7 middle">
        
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