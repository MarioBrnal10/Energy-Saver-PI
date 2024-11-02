
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    <title>Energy Saver</title>
    <style>
        /* Estilos para el cuerpo de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #117f55; /* Verde oscuro */
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        /* Estilos para el encabezado */
        header {
            background-color: #1c2833;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        /* Estilos para la barra de navegación */
        nav {
            background-color: #1c2833;
            padding: 10px 0;
            text-align: center;
        }

        .nav-link {
            margin: 0 30px;
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            transition: color 0.3s;
            font-size: 20px;
        }

        .nav-link:hover {
            color: #388e3c;
        }

        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }

        /* Estilos para el contenedor de información */
        .info {
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            text-align: center; /* Centra el contenido dentro del contenedor */
        }

        .info:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .info img {
            display: block;
            margin: 0 auto; /* Centra la imagen horizontalmente */
            max-width: 100%; /* Asegura que la imagen no se salga del contenedor */
            height: auto;
        }

        .info-text {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            text-align: justify;
            margin: 10px 0;
        }

        /* Estilos para los botones de inicio de sesión y registro */
        .buttons-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #1c2833; /* Verde primario */
            border: none; /* Sin borde */
            color: white; /* Color del texto */
            padding: 15px 20px; /* Espaciado interno */
            text-align: center; /* Alinear texto al centro */
            text-decoration: none; /* Sin decoración de texto */
            font-size: 16px; /* Tamaño de la fuente */
            cursor: pointer; /* Cambiar cursor a mano al pasar el ratón */
            border-radius: 8px; /* Borde redondeado */
            transition: background-color 0.3s; /* Transición suave de color de fondo */
            margin: 0 10px;
        }

        .btn:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el ratón */
        }

        .btn:active {
            background-color: #3e8e41; /* Verde más oscuro al hacer clic */
        }
    </style>
</head>
<body>
    <header>
        <h1>Energy Saver</h1>
    </header>
    <nav>
        <a href="{{route('rutaInicio')}}" class="text-bg-dark nav-link">Inicio</a>
        <a href="{{route('rutaCalculadora')}}" class="text-bg-dark nav-link">Calculadora</a>
    </nav>
    
    <div class="container">
        <div class="info">
            <img src="{{ asset('img/logotipo.jpeg') }}" alt="Logotipo">

            <p class="info-text">Somos una página web para ahorrar energía en el hogar. Ofrecemos soluciones inteligentes para optimizar el consumo y reducir el desperdicio.</p>
            <p class="info-text">¿Interesado en conocer más? Explora nuestras secciones o ponte en contacto con nosotros.</p>
        </div>
        <div class="buttons-container">
            <button class="btn" onclick="window.location.href='{{ route('rutaFormulario') }}'">Registrar</button>
            <button class="btn" onclick="window.location.href='{{ route('rutaLogin') }}'">Iniciar Sesión</button>

        </div>
    </div>
</body>
</html>