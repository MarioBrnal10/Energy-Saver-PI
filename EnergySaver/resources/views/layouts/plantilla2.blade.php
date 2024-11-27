<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logotipo.ico') }}" type="image/x-icon">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css"/>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


    @yield('css-estilos')
    @yield('css-vista')
    @yield('css-estilo')
    @yield('css-calcu')
    <style>
        /* Posicionar el botón de cerrar sesión en la esquina inferior izquierda */
        .logout-container {
            position: fixed;
            bottom: 20px; /* Espaciado desde abajo */
            left: 20px; /* Espaciado desde la izquierda */
            display: flex;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro translúcido */
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.3s ease;
            color: white;
        }
    
        /* Efecto al pasar el mouse */
        .logout-container:hover {
            background-color: #007BFF; /* Cambiar fondo a azul */
            transform: scale(1.05); /* Aumentar ligeramente el tamaño */
        }
    
        /* Imagen del botón */
        .logout-icon {
            margin-right: 10px; /* Espaciado entre el icono y el texto */
            width: 30px; /* Tamaño del icono */
            height: 30px;
        }
    
        /* Texto del botón */
        .logout-text {
            font-weight: bold;
            font-size: 14px;
            color: white;
        }
    </style>
    
    
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

        <div class="logout-container">
            <form id="rutaSalir" action="{{ route('rutaSalir') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button" style="background: none; border: none; display: flex; align-items: center; cursor: pointer;">
                    <img src="{{ asset('img/check-out.png') }}" alt="Cerrar sesión" class="logout-icon" />
                    <span class="logout-text">Cerrar sesión</span>
                </button>
            </form>
        </div>
        

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Seleccionamos el formulario y el botón
                const logoutForm = document.getElementById("rutaSalir");
        
                // Agregamos un evento de envío al formulario
                logoutForm.addEventListener("submit", function (e) {
                    e.preventDefault(); // Evita el envío inmediato del formulario
        
                    // Muestra la alerta de confirmación con Alertify.js
                    alertify.confirm(
                        "Confirmación de Cierre de Sesión",
                        "¿Estás seguro de que deseas cerrar sesión?",
                        function () {
                            // Si el usuario confirma, envía el formulario
                            logoutForm.submit();
                        },
                        function () {
                            // Si el usuario cancela, no pasa nada
                            alertify.error("Acción cancelada");
                        }
                    );
                });
            });
        </script>
        
        
        <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>