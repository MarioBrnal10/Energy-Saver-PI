@extends('layouts.plantilla2')

@section('titulo', 'Calculadora')
    @section('css-calcu')
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <link rel="stylesheet" href="{{asset('css/calcu.css')}}">
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    @endsection
    @section('contenidoCalcu')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
    <div class="calculadora-container">
        <div class="calculator-section">
            <div class="content">
                <div class="dropdown-input-container">
                    <label for="brandOptions">Elige una Marca:</label>
                    <select id="brandOptions" name="brandOptions" onchange="updateApplianceOptions()">
                        <option value="" disabled selected>Elige una Marca</option>
                        <!-- Marcas se cargarán aquí desde JavaScript -->
                    </select>
                </div>
            </div>
            <div class="content">
                <div class="dropdown-input-container">
                    <label for="applianceOptions">Elige un Electrodoméstico:</label>
                    <select id="applianceOptions" name="applianceOptions" onchange="displayPower()">
                        <option value="" disabled selected>Elige un Electrodoméstico</option>
                    </select>
                </div>
            </div>
            <div class="content">
                <label for="powerDisplay">Potencia del Electrodoméstico (W):</label>
                <input type="text" id="powerDisplay" readonly>
            </div>
            <div class="container">
                <label for="hoursInput">Introduce las horas de uso al día:</label>
                <select id="hoursInput">
                    <option value="0" disabled selected>Horas</option>
                    <!-- Generar opciones para las horas -->
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <label for="minutesInput">Introduce los minutos de uso al día:</label>
                <select id="minutesInput">
                    <option value="0" disabled selected>Minutos</option>
                    <!-- Generar opciones para los minutos -->
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
            </div>
            
            <div class="buttons">
                <button onclick="addAppliance()">Guardar Electrodoméstico</button>
            </div>
        </div>
    </div>
    <br>
    <div class="table-section">
        <div class="container">
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
                    <!-- Las filas de electrodomésticos se agregarán aquí -->
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <h2>Total Consumo Eléctrico y Costo</h2>
            <p id="totalConsumption">Consumo Total: 0 kWh</p>
            <p id="totalCost">Costo Total Mensual: $0.00</p>
        </div>
    </div>
    <div class="buttons">
        <button onclick="storeDataAndRedirect()">Calcular</button>
    </div>
    <br>
    
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('get_brands.php')
            .then(response => response.json())
            .then(data => {
                var brandSelect = document.getElementById("brandOptions");
                data.forEach(brand => {
                    var option = document.createElement("option");
                    option.value = brand.id;
                    option.textContent = brand.nombre;
                    brandSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching brands:', error);
                alert('Ocurrió un error al obtener las marcas.');
            });
    });

    function updateApplianceOptions() {
        var brandId = document.getElementById("brandOptions").value;
        var applianceSelect = document.getElementById("applianceOptions");
        applianceSelect.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';

        if (brandId) {
            fetch('get_appliances.php?brandId=' + encodeURIComponent(brandId))
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        data.forEach(appliance => {
                            var option = document.createElement("option");
                            option.value = appliance.id;
                            option.textContent = appliance.nombre;
                            applianceSelect.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching appliances:', error);
                    alert('Ocurrió un error al obtener los electrodomésticos.');
                });
        }
    }

    function displayPower() {
        var applianceId = document.getElementById("applianceOptions").value;

        if (applianceId) {
            fetch('get_appliances.php?id=' + encodeURIComponent(applianceId))
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById("powerDisplay").value = data.potencia + " W";
                    }
                })
                .catch(error => {
                    console.error('Error fetching power:', error);
                    alert('Ocurrió un error al obtener la potencia.');
                });
        } else {
            document.getElementById("powerDisplay").value = "";
        }
    }

    function addAppliance() {
        var brand = document.getElementById("brandOptions").value;
        var applianceSelect = document.getElementById("applianceOptions");
        var applianceText = applianceSelect.options[applianceSelect.selectedIndex].text;
        var applianceId = applianceSelect.value;
        var power = parseFloat(document.getElementById("powerDisplay").value);
        var hours = parseInt(document.getElementById("hoursInput").value);
        var minutes = parseInt(document.getElementById("minutesInput").value);

        if (!brand || !applianceId || isNaN(hours) || isNaN(minutes)) {
            alert("Por favor, selecciona una marca, un electrodoméstico, y las horas o minutos de uso.");
            return;
        }

        // Ajuste para refrigeradores
        var totalHours;
        if (applianceText.toLowerCase().includes('refrigerador')) {
            totalHours = 8; // Suponemos que los refrigeradores están en funcionamiento promedio 8 horas al día
        } else {
            totalHours = hours + (minutes / 60);
        }

        var dailyConsumption = power * totalHours; // Consumo diario en Wh
        var monthlyConsumption = dailyConsumption * 30; // Consumo mensual en Wh

        var cost;
        if (monthlyConsumption / 1000 <= 75) {
            cost = monthlyConsumption / 1000 * 0.809;
        } else if (monthlyConsumption / 1000 <= 140) {
            cost = monthlyConsumption / 1000 * 0.976;
        } else {
            cost = monthlyConsumption / 1000 * 2.85;
        }

        var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();

        var actionCell = newRow.insertCell(0);
        var brandApplianceCell = newRow.insertCell(1);
        var dailyConsumptionCell = newRow.insertCell(2);
        var monthlyConsumptionCell = newRow.insertCell(3);
        var costCell = newRow.insertCell(4);

        var removeButton = document.createElement("button");
        removeButton.textContent = "Eliminar";
        removeButton.onclick = function() {
            table.deleteRow(newRow.rowIndex - 1);
            updateTotals();
            updateLocalStorage();
        };
        actionCell.appendChild(removeButton);

        brandApplianceCell.textContent = `${brand} - ${applianceText}`;
        dailyConsumptionCell.textContent = dailyConsumption.toFixed(2);
        monthlyConsumptionCell.textContent = (monthlyConsumption / 1000).toFixed(2);
        costCell.textContent = `$${cost.toFixed(2)}`;

        // Clear the inputs
        document.getElementById("brandOptions").selectedIndex = 0;
        document.getElementById("applianceOptions").innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';
        document.getElementById("powerDisplay").value = "";
        document.getElementById("hoursInput").selectedIndex = 0;
        document.getElementById("minutesInput").selectedIndex = 0;

        updateTotals();
        saveCalculation({ applianceText, applianceId, power, hours, minutes, dailyConsumption, monthlyConsumption, cost });
        updateLocalStorage();
    }

    function updateTotals() {
        var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var totalConsumption = 0;
        var totalCost = 0;

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var monthlyConsumption = parseFloat(cells[3].textContent);
            var cost = parseFloat(cells[4].textContent.replace('$', ''));
            totalConsumption += monthlyConsumption;
            totalCost += cost;
        }

        document.getElementById("totalConsumption").textContent = `Consumo Total: ${totalConsumption.toFixed(2)} kWh`;
        document.getElementById("totalCost").textContent = `Costo Total Mensual: $${totalCost.toFixed(2)}`;
    }

    function updateLocalStorage() {
        var table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var appliances = [];

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            appliances.push({
                brandAppliance: cells[1].textContent,
                dailyConsumption: parseFloat(cells[2].textContent),
                monthlyConsumption: parseFloat(cells[3].textContent),
                cost: parseFloat(cells[4].textContent.replace('$', ''))
            });
        }

        localStorage.setItem('appliances', JSON.stringify(appliances));
    }

    function saveCalculation(data) {
        fetch('save_calculation.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (!result.success) {
                alert('Error al guardar el cálculo: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error al guardar el cálculo:', error);
        });
    }

    function storeDataAndRedirect() {
        updateLocalStorage();
        window.location.href = '{{route('rutaVisual')}}';
    }
</script>
