<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    <title>Calculadora</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #117f55;/* Verde oscuro */
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
    
        .title-container {
            text-align: center;
            margin: 20px;
        }
    
        .title-container h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
    
        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
    
        .buttons button {
            background-color: #1c2833;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
    
        .buttons button:hover {
            background-color: #1c2833;
        }
    
        .content {
            display: flex;
            justify-content: center;
            margin: 20px;
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
    
        .dropdown-input-container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    
        .dropdown-input-container label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }
    
        .dropdown-input-container select,
        .dropdown-input-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
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
    
        td {
            color: #333;
        }
    
        .registration-prompt {
            text-align: center;
            margin: 20px;
        }
    
        .registration-prompt h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
    
        .registration-prompt p {
            font-size: 1em;
            margin-bottom: 20px;
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
    
    <div class="main-container">
        <div class="title-container">
            <h1>Calculadora</h1>
            <div class="buttons">
                <button onclick="storeDataAndRedirect()">Calcular</button>
            </div>
        </div>
        <br>
        <div>
            <h2>Electrodomésticos</h2>
        </div>
        <br>
        <div class="content">
            <div class="dropdown-input-container">
                <label for="brandOptions">Elige una Marca:</label>
                <select id="brandOptions" name="brandOptions">
                    <option value="" disabled selected>Elige una Marca</option>
                    <option value="samsung">Samsung</option>
                    <option value="lg">LG</option>
                    <option value="whirlpool">Whirlpool</option>
                    <option value="mabe">Mabe</option>
                </select>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="dropdown-input-container">
                <label for="applianceOptions">Elige un Electrodoméstico:</label>
                <select id="applianceOptions" name="applianceOptions">
                    <option value="" disabled selected>Elige un Electrodoméstico</option>
                    <option value="refrigerador">Refrigerador</option>
                    <option value="microondas">Horno de Microondas</option>
                    <option value="licuadora">Licuadora</option>
                    <option value="estufa">Estufa</option>
                </select>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="dropdown-input-container">
                <label for="dropdown">Elige el consumo eléctrico:</label>
                <select id="dropdown" onchange="setDropdownValue()">
                    <option value="" disabled selected>Elige el consumo eléctrico</option>
                    <option value="50">50 kWh</option>
                    <option value="100">100 kWh</option>
                    <option value="200">200 kWh</option>
                    <option value="300">300 kWh</option>
                    <option value="400">400 kWh</option>
                    <option value="500">500 kWh</option>
                </select>
                <label for="numberInput"> o introduce un valor (kWh):</label>
                <input type="number" id="numberInput" value="" min="50" max="500" step="10" onchange="setInputValue()">
            </div>
        </div>
        <br>
        <div class="content">
            <div class="dropdown-input-container">
                <label for="hoursInput">Introduce las horas de uso al día:</label>
                <input type="number" id="hoursInput" value="" min="1" step="1">
            </div>
        </div>
        <br>
        <div class="buttons">
            <button onclick="addAppliance()">Guardar Electrodoméstico</button>
        </div>
        <br>
        <div>
            <h2>Lista de Electrodomésticos</h2>
            <table id="applianceTable">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Electrodoméstico</th>
                        <th>Consumo Eléctrico (kWh)</th>
                        <th>Horas de Uso (h/día)</th>
                        <th>Costo Diario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas de electrodomésticos se agregarán aquí -->
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <h2>Total Consumo Eléctrico y Costo</h2>
            <p id="totalConsumption">Consumo Total: 0 kWh</p>
            <p id="totalCost">Costo Total Diario: $0.00</p>
        </div>
    </div>
    <br>
    <br>
    <div class="registration-prompt">
        <h2>¿Quieres llevar un seguimiento más preciso?</h2>
        <p>Para obtener un seguimiento detallado de tu consumo de energía y acceder a más funcionalidades, te recomendamos que te registres.</p>
        <button class="btn" onclick="window.location.href='formulario.html'">Registrar</button>
        <button class="btn" onclick="window.location.href='login.html'">Iniciar Sesión</button>
    </div>
    <br>
    <br>
    <script>
        function setDropdownValue() {
            document.getElementById("numberInput").value = document.getElementById("dropdown").value;
        }
    
        function setInputValue() {
            var inputValue = document.getElementById("numberInput").value;
            var dropdown = document.getElementById("dropdown");
    
            for (var i = 0; i < dropdown.options.length; i++) {
                if (dropdown.options[i].value == inputValue) {
                    dropdown.selectedIndex = i;
                    return;
                }
            }
            dropdown.selectedIndex = 0; // Clear selection if input value doesn't match any option
        }
    
        function addAppliance() {
            var brand = document.getElementById("brandOptions").value;
            var appliance = document.getElementById("applianceOptions").value;
            var consumption = document.getElementById("numberInput").value;
            var hours = document.getElementById("hoursInput").value;
    
            if (!brand || !appliance || !consumption || !hours) {
                alert("Por favor, selecciona una marca, un electrodoméstico, un consumo eléctrico y las horas de uso.");
                return;
            }
    
            var dailyConsumption = (consumption * hours) / 24; // Consumo diario en kWh
    
            var cost;
            if (dailyConsumption <= 75) {
                cost = dailyConsumption * 0.809;
            } else if (dailyConsumption <= 140) {
                cost = dailyConsumption * 0.976;
            } else {
                cost = dailyConsumption * 2.85;
            }
    
            var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
    
            var brandCell = newRow.insertCell(0);
            var applianceCell = newRow.insertCell(1);
            var consumptionCell = newRow.insertCell(2);
            var hoursCell = newRow.insertCell(3);
            var costCell = newRow.insertCell(4);
            var actionCell = newRow.insertCell(5);
    
            brandCell.textContent = document.querySelector('#brandOptions option[value="' + brand + '"]').textContent;
            applianceCell.textContent = document.querySelector('#applianceOptions option[value="' + appliance + '"]').textContent;
            consumptionCell.textContent = consumption;
            hoursCell.textContent = hours;
            costCell.textContent = `$${cost.toFixed(2)}`;
    
            var removeButton = document.createElement("button");
            removeButton.textContent = "Eliminar";
            removeButton.onclick = function() {
                table.deleteRow(newRow.rowIndex - 1);
                updateTotals();
                updateLocalStorage();
            };
            actionCell.appendChild(removeButton);
    
            // Clear the inputs
            document.getElementById("brandOptions").selectedIndex = 0;
            document.getElementById("applianceOptions").selectedIndex = 0;
            document.getElementById("numberInput").value = "";
            document.getElementById("dropdown").selectedIndex = 0;
            document.getElementById("hoursInput").value = "";
    
            updateTotals();
            updateLocalStorage();
        }
    
        function updateTotals() {
            var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var totalConsumption = 0;
            var totalCost = 0;
    
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var consumption = parseFloat(cells[2].textContent);
                var hours = parseFloat(cells[3].textContent);
                var dailyConsumption = (consumption * hours) / 24;
                totalConsumption += dailyConsumption;
    
                var cost;
                if (dailyConsumption <= 75) {
                    cost = dailyConsumption * 0.809;
                } else if (dailyConsumption <= 140) {
                    cost = dailyConsumption * 0.976;
                } else {
                    cost = dailyConsumption * 2.85;
                }
                totalCost += cost;
            }
    
            document.getElementById("totalConsumption").textContent = `Consumo Total: ${totalConsumption.toFixed(2)} kWh`;
            document.getElementById("totalCost").textContent = `Costo Total Diario: $${totalCost.toFixed(2)}`;
        }
    
        function updateLocalStorage() {
            var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var appliances = [];
    
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                appliances.push({
                    brand: cells[0].textContent,
                    appliance: cells[1].textContent,
                    consumption: parseFloat(cells[2].textContent),
                    hours: parseFloat(cells[3].textContent),
                    cost: parseFloat(cells[4].textContent.replace('$', ''))
                });
            }
    
            localStorage.setItem('appliances', JSON.stringify(appliances));
        }
    
        function storeDataAndRedirect() {
            updateLocalStorage();
            window.location.href = 'grafica.html';
        }
    </script>
    <br>
    <br>
</body>
</html>