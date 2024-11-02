<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico') }}" type="image/x-icon">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('css-estilos')
    @yield('css-vista')
    @yield('css-estilo')
    @yield('css-calcu')
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: url('{{ asset('img/Fondo.jpg') }}') no-repeat center center fixed; background-size: cover;">
    <nav class="navbar navbar-expand-lg" style="background-color: #1a1f26; padding: 20px 0;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin: 0 auto;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('rutaHome') }}" style="color: #c4d7e0; font-weight: bold; padding: 8px 20px; text-align: center;">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rutaCalcu') }}" style="color: #c4d7e0; font-weight: bold; padding: 8px 20px; text-align: center;">
                            Calculadora
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rutaVinculaciones') }}" style="color: #c4d7e0; font-weight: bold; padding: 8px 20px; text-align: center;">
                            Asociaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rutaContacto') }}" style="color: #c4d7e0; font-weight: bold; padding: 8px 20px; text-align: center;">
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

        <div class="content">
            @yield('contenidoHome')
        </div>

        <div class="content">
            @yield('contenidoCalcu')
        </div>

        <div class="content">
            @yield('contenidoVinculacion')
        </div>

        <div class="content">
            @yield('contenidoContacto')
        </div>

        <div class="content">
            @yield('contenidoVista')
        </div>

        <div class="content">
            @yield('contenidoConsejos')
        </div>
</body>
</html>