<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    @yield('css-admin')
</head>
<body>
    <!-- Botón para ocultar las opciones -->
    <button class="toggle-btn btn" onclick="toggleSidebar()">
        &#9776;
    </button>
    <!-- Barra Lateral (Sidebar) -->
    <aside class="sidebar bg-dark" id="sidebar">
        <div class="container-fluid flex-column">
            <a class="navbar-brand mb-4 text-white" href="#">Panel Principal</a>
            <div class="navbar-nav flex-column">
                <a class="nav-link active text-white" aria-current="page" href="#">Usuarios</a>
                <a class="nav-link text-white" href="#">Electrodomésticos</a>
                <a class="nav-link text-white" href="#">Asociaciones</a>
                <a class="nav-link disabled text-secondary" aria-disabled="true">Mensajes</a>
            </div>
        </div>
    </aside>

    <!-- Encabezado Principal (Header) -->
    <header class="bg-dark border-bottom border-body p-3">
        <div class="container-fluid">
            
        </div>
    </header>

    <!-- Contenido Principal -->
    <main id="content" class="content">
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        }
    </script>
</body>
</html>
