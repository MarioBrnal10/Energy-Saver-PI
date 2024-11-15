<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    @yield('css-login')
    @yield('css-formulario')
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>

    <div class="content">
        @yield('login')
    </div>

    <div class="content">
        @yield('formulario')
    </div>
</body>
</html>