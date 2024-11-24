<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    @yield('css-admi')
    @yield('css-AdminUsuariosForm')
</head>
<style>
    .nav-link {
        position: relative;
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .nav-link:hover {
        background-color: #007BFF; /* Fondo azul al pasar el mouse */
    }

    .nav-link img {
        transition: transform 0.3s ease-in-out; /* Suaviza el movimiento si deseas agregar efectos */
    }
</style>

<body style="margin: 0; font-family: Arial, sans-serif; background: url('{{ asset('img/FA4.jpg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white position-fixed" style="top: 0; left: 0; width: 280px; height: 100vh; padding: 20px;">
            <a href="{{ route('rutaAdmin') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="{{ asset('img/security.png') }}" alt="Logotipo" width="40" height="40" class="me-2">
                <span class="fs-4">Panel De Control</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('rutaAdminVisualUsuarios')}}" class="nav-link text-white" aria-current="page">
                        <img src="{{ asset('img/user.png') }}" alt="Usuarios" width="40" height="40" class="me-2">
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <img src="{{ asset('img/electric-appliance.png') }}" alt="Electrodomésticos" width="40" height="40" class="me-2">
                        Electrodomésticos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <img src="{{ asset('img/communicate.png') }}" alt="Mensajes" width="40" height="40" class="me-2">
                        Mensajes
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <img src="{{ asset('img/calendar.png') }}" alt="Agenda" width="40" height="40" class="me-2">
                        Agenda
                    </a>
                </li>
                <li>
                    <a href="{{ route('rutaAdminForm') }}" class="nav-link text-white">
                        <img src="{{ asset('img/admin.png') }}" alt="Administradores" width="40" height="40" class="me-2">
                        Administradores
                    </a>
                </li>
            </ul>
        </div>
        

        <!-- Contenedor del contenido principal -->
        <div class="main-content" style="flex-grow: 1; margin-left: 300px; padding: 20px;">
            @yield('contenidoUsuariosAdminForm')
            @yield('contenidoAdmisActivos')
        </div>
    </div>
</body>
</html>
