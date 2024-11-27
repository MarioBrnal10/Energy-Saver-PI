@extends('layouts.plantilla2')

@section('titulo', 'Calculadora')

@section('css-calcu')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calcu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
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
                    <!-- Las marcas se cargarán dinámicamente con JavaScript -->
                </select>
            </div>
        </div>

        <div class="content">
            <div class="dropdown-input-container">
                <label for="applianceOptions">Elige un Electrodoméstico:</label>
                <select id="applianceOptions" name="applianceOptions" onchange="displayPower()">
                    <option value="" disabled selected>Elige un Electrodoméstico</option>
                    <!-- Los electrodomésticos se cargarán dinámicamente con JavaScript -->
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
                @for ($i = 0; $i <= 24; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>

            <label for="minutesInput">Introduce los minutos de uso al día:</label>
            <select id="minutesInput">
                <option value="0" disabled selected>Minutos</option>
                <!-- Generar opciones para los minutos -->
                @for ($i = 0; $i <= 55; $i += 5)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        
        <div class="buttons">
            <button type="button" onclick="addAppliance()">Guardar Electrodoméstico</button>

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
                <!-- Las filas de electrodomésticos se agregarán dinámicamente con JavaScript -->
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

<script>
    // Llenar marcas al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/marcas') // Ruta Laravel para obtener las marcas
            .then(response => response.json())
            .then(data => {
                const brandSelect = document.getElementById("brandOptions");
                data.forEach(brand => {
                    const option = document.createElement("option");
                    option.value = brand.nombre; // Usar el nombre como valor
                    option.textContent = brand.nombre; // Mostrar el nombre en el select
                    brandSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar marcas:', error);
                alertify.error('Ocurrió un error al obtener las marcas.');
            });
    });

    // Actualizar electrodomésticos según la marca seleccionada
    function updateApplianceOptions() {
        const brandName = document.getElementById("brandOptions").value;
        const applianceSelect = document.getElementById("applianceOptions");
        applianceSelect.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';

        if (brandName) {
            fetch(`/electrodomesticos?marca=${encodeURIComponent(brandName)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alertify.error(data.error);
                    } else {
                        data.forEach(appliance => {
                            const option = document.createElement("option");
                            option.value = appliance.nombre;
                            option.textContent = appliance.nombre;
                            applianceSelect.appendChild(option);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error al cargar electrodomésticos:', error);
                    alertify.error('Ocurrió un error al obtener los electrodomésticos.');
                });
        }
    }

    // Mostrar potencia según el electrodoméstico seleccionado
    function displayPower() {
        const applianceName = document.getElementById("applianceOptions").value;
        const brandName = document.getElementById("brandOptions").value;

        if (applianceName && brandName) {
            fetch(`/potencia?marca=${encodeURIComponent(brandName)}&electrodomestico=${encodeURIComponent(applianceName)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alertify.error(data.error);
                    } else {
                        document.getElementById("powerDisplay").value = data.potencia + " W";
                    }
                })
                .catch(error => {
                    console.error('Error al cargar la potencia:', error);
                    alertify.error('Ocurrió un error al obtener la potencia.');
                });
        } else {
            document.getElementById("powerDisplay").value = "";
        }
    }

    // Agregar electrodoméstico a la tabla
    function addAppliance() {
    const brand = document.getElementById("brandOptions").value;
    const applianceName = document.getElementById("applianceOptions").value;
    const power = parseFloat(document.getElementById("powerDisplay").value);
    const hours = parseInt(document.getElementById("hoursInput").value) || 0; // Si no se ingresa nada, usar 0
    const minutes = parseInt(document.getElementById("minutesInput").value) || 0; // Si no se ingresa nada, usar 0

    // Verifica si al menos uno de los campos tiene un valor válido
    if (!brand || !applianceName || (hours === 0 && minutes === 0)) {
        alertify.alert("Error", "Por favor, selecciona una marca, un electrodoméstico, y al menos horas o minutos de uso.");
        return;
    }

    const totalHours = hours + (minutes / 60); // Convertir minutos a horas
    const dailyConsumption = power * totalHours; // Consumo diario en Wh
    const monthlyConsumption = dailyConsumption * 30; // Consumo mensual en Wh

    const cost = calculateCost(monthlyConsumption);

    const table = document.getElementById("applianceTable").getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `
        <td><button onclick="removeRow(this)">Eliminar</button></td>
        <td>${brand} - ${applianceName}</td>
        <td>${dailyConsumption.toFixed(2)}</td>
        <td>${(monthlyConsumption / 1000).toFixed(2)}</td>
        <td>$${cost.toFixed(2)}</td>
    `;

    updateTotals();
    resetFormFields(); // Resetea los campos del formulario
    alertify.success("Electrodoméstico agregado con éxito.");
}



    // Calcular costo basado en consumo
    function calculateCost(monthlyConsumption) {
        const consumptionKWh = monthlyConsumption / 1000;
        if (consumptionKWh <= 75) {
            return consumptionKWh * 0.809;
        } else if (consumptionKWh <= 140) {
            return consumptionKWh * 0.976;
        } else {
            return consumptionKWh * 2.85;
        }
    }

    // Eliminar fila de la tabla
    function removeRow(button) {
        const row = button.parentElement.parentElement;
        row.parentElement.removeChild(row);
        updateTotals();
        alertify.warning("Electrodoméstico eliminado.");
    }

    // Actualizar totales
    function updateTotals() {
        const rows = document.querySelectorAll("#applianceTable tbody tr");
        let totalConsumption = 0;
        let totalCost = 0;

        rows.forEach(row => {
            const monthlyConsumption = parseFloat(row.cells[3].textContent);
            const cost = parseFloat(row.cells[4].textContent.replace('$', ''));
            totalConsumption += monthlyConsumption;
            totalCost += cost;
        });

        document.getElementById("totalConsumption").textContent = `Consumo Total: ${totalConsumption.toFixed(2)} kWh`;
        document.getElementById("totalCost").textContent = `Costo Total Mensual: $${totalCost.toFixed(2)}`;
    }

    function resetFormFields() {
    document.getElementById("brandOptions").value = ""; // Resetea el select de marcas
    const applianceSelect = document.getElementById("applianceOptions");
    applianceSelect.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>'; // Resetea el select de electrodomésticos
    document.getElementById("powerDisplay").value = ""; // Limpia el campo de potencia
    document.getElementById("hoursInput").value = ""; // Limpia el campo de horas
    document.getElementById("minutesInput").value = ""; // Limpia el campo de minutos
}


    // Guardar datos en localStorage y redirigir
    function storeDataAndRedirect() {
        const rows = document.querySelectorAll("#applianceTable tbody tr");
        const electrodomesticos = [];

        rows.forEach(row => {
            const equipo = row.cells[1].textContent.split(" - ");
            const consumo = parseFloat(row.cells[3].textContent) * 1000; // Convertir kWh a Wh
            const horas_activas = parseFloat(row.cells[2].textContent);

            electrodomesticos.push({
                equipo: equipo.join(" - "), // Marca y electrodoméstico
                consumo: consumo,
                horas_activas: horas_activas,
                costo: calculateCost(consumo) // Guardar costo calculado
            });
        });

        if (electrodomesticos.length === 0) {
            alertify.alert("Error", "No hay electrodomésticos para guardar.");
            return;
        }

        // Guardar en localStorage
        localStorage.setItem("electrodomesticos", JSON.stringify(electrodomesticos));

        // Mostrar alerta y redirigir
        alertify.alert("Cálculo guardado", "Cálculo realizado con éxito.", function() {
            window.location.href = "{{ route('rutaVisual') }}";
        });
    }
</script>



@endsection