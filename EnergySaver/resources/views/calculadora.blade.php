<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    <title>Calculadora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #117f55;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

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

        nav {
            background-color: #1c2833;
            padding: 10px 0;
            text-align: center;
        }

        .nav-link {
            margin: 0 30px;
            text-decoration: none;
            color: #fbfbfb;
            font-weight: bold;
            transition: color 0.3s;
            font-size: 20px;
        }

        .nav-link:hover {
            color: #388e3c;
        }

        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .dropdown-input-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            text-align: left;
            width: 100%;
            max-width: 500px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #388e3c;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Energy Saver</h1>
    </header>
    <nav>
        <a href="{{route('rutaInicio')}}" class="nav-link">Inicio</a>
        <a href="{{route('rutaCalculadora')}}" class="nav-link">Calculadora</a>
    </nav>
    <div class="main-container">
        <h2>Selecciona los detalles del electrodoméstico</h2>

        <div class="dropdown-input-container">
            <label for="brandOptions">Marca:</label>
            <select id="brandOptions" name="brandOptions" onchange="fetchElectrodomesticos(this.value)">
                <option value="" disabled selected>Elige una Marca</option>
            </select>
        </div>

        <div class="dropdown-input-container">
            <label for="applianceOptions">Electrodoméstico:</label>
            <select id="applianceOptions" name="applianceOptions" onchange="fetchPotencia(this.value)">
                <option value="" disabled selected>Elige un Electrodoméstico</option>
            </select>
        </div>

        <div class="dropdown-input-container">
            <label for="numberInput">Potencia (kWh):</label>
            <input type="number" id="numberInput" readonly>
        </div>

        <div>
            <h2>Lista de Electrodomésticos</h2>
            <table id="applianceTable">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Electrodoméstico</th>
                        <th>Potencia (kWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se agregarán las filas dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Llenar marcas al cargar la página
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/marcas')
                .then(response => response.json())
                .then(data => {
                    const brandOptions = document.getElementById("brandOptions");
                    data.forEach(marca => {
                        const option = document.createElement("option");
                        option.value = marca.nombre; // Se usa el nombre de la marca como valor
                        option.textContent = marca.nombre; // Se muestra el nombre de la marca
                        brandOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar las marcas:', error));
        });

        // Obtener electrodomésticos según la marca seleccionada
        function fetchElectrodomesticos(marcaNombre) {
            fetch(`/electrodomesticos/${marcaNombre}`)
                .then(response => response.json())
                .then(data => {
                    const applianceOptions = document.getElementById("applianceOptions");
                    applianceOptions.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';
                    data.forEach(electrodomestico => {
                        const option = document.createElement("option");
                        option.value = electrodomestico.nombre; // Asumiendo que los electrodomésticos tienen un nombre
                        option.textContent = electrodomestico.nombre;
                        applianceOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar los electrodomésticos:', error));
        }

        // Obtener potencia según el tipo de electrodoméstico y marca
        function fetchPotencia(tipoNombre) {
            const marcaNombre = document.getElementById("brandOptions").value;
            fetch(`/potencia/${tipoNombre}/${marcaNombre}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("numberInput").value = data.potencia || '';
                })
                .catch(error => console.error('Error al cargar la potencia:', error));
        }
    </script>
</body>
</html>
