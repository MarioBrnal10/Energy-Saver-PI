@extends('layouts.plantilla2')

@section('titulo', 'Calculadora')

@section('css-calcu')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calcu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endsection

@section('contenidoCalcu')
<style>
    body {
        background-color: #f5f7fa;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        text-align: center;
        color: #333;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        max-width: 800px;
        margin: 50px auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.2s ease-out;
    }

    h1 {
        font-size: 2.5em;
        color: #4caf50;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .dropdown-input-container {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
        animation: inputAnimation 0.5s ease-out;
    }

    .dropdown-input-container select, .dropdown-input-container input {
        width: 100%;
        padding: 12px 30px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1em;
        background-color: #fafafa;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .dropdown-input-container select:focus, .dropdown-input-container input:focus {
        border-color: #4caf50;
        outline: none;
    }

    .dropdown-input-container select {
        padding-left: 40px;
    }

    .dropdown-input-container input {
        padding-left: 40px;
    }

    .dropdown-input-container .icon {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        color: #4caf50;
        font-size: 18px;
        pointer-events: none;
    }

    .button {
        display: inline-block;
        background-color: #4caf50;
        color: white;
        font-size: 1.1em;
        padding: 12px 35px;
        border-radius: 25px;
        text-decoration: none;
        margin-top: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s ease-in-out;
    }

    .button:hover {
        background-color: #45a049;
        transform: translateY(-3px);
    }

    .button:active {
        background-color: #388e3c;
        transform: translateY(1px);
    }

    .table-section {
        margin-top: 50px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 14px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        color: #333;
    }

    th {
        background-color: #4caf50;
        color: white;
        text-transform: uppercase;
        font-weight: 600;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .buttons {
        text-align: center;
        margin-top: 30px;
    }

    .buttons button {
        background-color: #4caf50;
        color: white;
        padding: 15px 40px;
        border-radius: 25px;
        border: none;
        font-size: 1.1em;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease-in-out;
    }

    .buttons button:hover {
        background-color: #45a049;
        transform: translateY(-3px);
    }

    .buttons button:active {
        background-color: #388e3c;
        transform: translateY(1px);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes inputAnimation {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<div class="container">
    <h1>Calculadora de Consumo Eléctrico</h1>
    
    <div class="dropdown-input-container">
        <label for="brandOptions">Elige una Marca:</label>
        <i class="icon fas fa-robot"></i>
        <select id="brandOptions" name="brandOptions" onchange="updateApplianceOptions()">
            <option value="" disabled selected>Elige una Marca</option>
        </select>
    </div>

    <div class="dropdown-input-container">
        <label for="applianceOptions">Elige un Electrodoméstico:</label>
        <i class="icon fas fa-plug"></i>
        <select id="applianceOptions" name="applianceOptions" onchange="displayPower()">
            <option value="" disabled selected>Elige un Electrodoméstico</option>
        </select>
    </div>

    <div class="dropdown-input-container">
        <label for="powerDisplay">Potencia del Electrodoméstico (W):</label>
        <i class="icon fas fa-bolt"></i>
        <input type="text" id="powerDisplay" readonly>
    </div>

    <div class="dropdown-input-container">
        <label for="hoursInput">Introduce las horas de uso al día:</label>
        <i class="icon fas fa-clock"></i>
        <select id="hoursInput">
            <option value="0" disabled selected>Horas</option>
            @for ($i = 0; $i <= 24; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="dropdown-input-container">
        <label for="minutesInput">Introduce los minutos de uso al día:</label>
        <i class="icon fas fa-clock"></i>
        <select id="minutesInput">
            <option value="0" disabled selected>Minutos</option>
            @for ($i = 0; $i <= 55; $i += 5)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="buttons">
        <button type="button" onclick="addAppliance()">Guardar Electrodoméstico</button>
    </div>
</div>

<div class="table-section">
    <h2>Lista de Electrodomésticos</h2>
    <table id="applianceTable">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Equipo</th>
                <th>Wh/día</th>
                <th>kWh/Mes</th>
                <th>$/Mes</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div>
        <h3>Total Consumo Eléctrico y Costo</h3>
        <p id="totalConsumption">Consumo Total: 0 kWh</p>
        <p id="totalCost">Costo Total Mensual: $0.00</p>
    </div>

    <div class="buttons">
        <button onclick="storeDataAndRedirect()">Calcular</button>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    const appliances = {
        "Samsung": {
            "Aire acondicionado": 1500,
            "Refrigerador": 150,
            "Lavadora": 400,
            "Secadora": 1800
        },
        "LG": {
            "Aire acondicionado": 1200,
            "Refrigerador": 160,
            "Lavadora": 350,
            "Secadora": 1600
        }
    };

    const costs = 0.9;

    function updateApplianceOptions() {
        const brandSelect = document.getElementById('brandOptions');
        const applianceSelect = document.getElementById('applianceOptions');
        applianceSelect.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';

        const selectedBrand = brandSelect.value;
        const appliancesList = appliances[selectedBrand];
        
        for (let appliance in appliancesList) {
            const option = document.createElement('option');
            option.value = appliance;
            option.textContent = appliance;
            applianceSelect.appendChild(option);
        }
    }

    function displayPower() {
        const applianceSelect = document.getElementById('applianceOptions');
        const powerDisplay = document.getElementById('powerDisplay');
        const selectedAppliance = applianceSelect.value;
        const brandSelect = document.getElementById('brandOptions');
        const selectedBrand = brandSelect.value;

        const power = appliances[selectedBrand][selectedAppliance];
        powerDisplay.value = power ? `${power} W` : '';
    }

    function addAppliance() {
        const applianceSelect = document.getElementById('applianceOptions');
        const powerDisplay = document.getElementById('powerDisplay');
        const hoursInput = document.getElementById('hoursInput');
        const minutesInput = document.getElementById('minutesInput');
        const applianceTable = document.getElementById('applianceTable').getElementsByTagName('tbody')[0];

        const selectedAppliance = applianceSelect.value;
        const power = parseInt(powerDisplay.value.replace(' W', ''));
        const hours = parseInt(hoursInput.value);
        const minutes = parseInt(minutesInput.value);

        if (selectedAppliance && power && hours >= 0 && minutes >= 0) {
            const totalWh = ((hours * 60 + minutes) * power) / 60;
            const totalKwh = totalWh / 1000;
            const totalCost = totalKwh * costs;

            const row = applianceTable.insertRow();
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Eliminar';
            deleteBtn.onclick = () => row.remove();

            row.insertCell(0).appendChild(deleteBtn);
            row.insertCell(1).textContent = selectedAppliance;
            row.insertCell(2).textContent = totalWh.toFixed(2) + ' Wh';
            row.insertCell(3).textContent = totalKwh.toFixed(2) + ' kWh';
            row.insertCell(4).textContent = '$' + totalCost.toFixed(2);

            updateTotalConsumptionAndCost();
        }
    }

    function updateTotalConsumptionAndCost() {
        const applianceTable = document.getElementById('applianceTable').getElementsByTagName('tbody')[0];
        let totalWh = 0;
        let totalCost = 0;

        for (let row of applianceTable.rows) {
            const wh = parseFloat(row.cells[2].textContent);
            const cost = parseFloat(row.cells[4].textContent.replace('$', ''));
            totalWh += wh;
            totalCost += cost;
        }

        document.getElementById('totalConsumption').textContent = `Consumo Total: ${(totalWh / 1000).toFixed(2)} kWh`;
        document.getElementById('totalCost').textContent = `Costo Total Mensual: $${totalCost.toFixed(2)}`;
    }

    function storeDataAndRedirect() {
        alert('Cálculo realizado.');
    }
</script>
@endsection
