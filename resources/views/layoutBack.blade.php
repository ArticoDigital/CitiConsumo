<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/back/style.css')}}">
    @yield('styles')
</head>
<body>
    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
</body>
</html>