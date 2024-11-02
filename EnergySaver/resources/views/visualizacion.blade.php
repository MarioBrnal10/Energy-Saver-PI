@extends('layouts.plantilla2')

@section('titulo', 'Grafica de Consumo')
    @section('css-vista')
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <link rel="stylesheet" href="{{asset('css/grafica.css')}}">
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    @endsection

    @section('contenidoVista')
    <style>
        .transparent-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con 80% de opacidad */
            padding: 20px;
            border-radius: 10px;
        }
        .chart-container {
            width: 70%;
            height: 400px; /* Ajusta la altura según sea necesario */
            display: inline-block;
        }
        .color-bar-container {
            width: 20%;
            height: 400px; /* Ajusta la altura según sea necesario */
            display: inline-block;
            position: relative;
            margin-left: 10px;
        }
        .color-bar {
            width: 20px;
            height: 100%;
            background: linear-gradient(to top, green, yellow, orange, red);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .arrow {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid black;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <!-- Título de la sección -->
    <div class="title-container transparent-container">
        <h1>Gráfica de Consumo Eléctrico</h1>
    </div>
    <br>

    <!-- Sección de gráficos -->
    <div class="chart-section">
        <div class="container transparent-container">
            <div id="consumptionChart" class="chart-container"></div>

            <!-- Barra de colores para el consumo -->
            <div class="color-bar-container">
                <div class="color-bar"></div>
                <div id="consumptionArrow" class="arrow"></div>
            </div>

            <!-- Mensajes de consumo -->
            <div class="message-container">
                <p id="mostConsumptionMessage"></p>
                <p id="totalConsumptionMessage"></p>
                <p id="weeklyConsumptionMessage"></p>
                <p id="monthlyConsumptionMessage"></p>
            </div>
        </div>
    </div>

    <!-- Botones de navegación -->
    <div class="button-container transparent-container">
        <button onclick="location.href='{{route('rutaCalcu')}}'">Volver a la Calculadora</button>
        <button onclick="location.href='{{route('rutaConsejos')}}'">Ver Consejos y Recomendaciones</button>
        <button onclick="location.href='historial.php'">Ver Historial de Cálculos</button>
    </div>

    <script>
        <!-- Script para generar el gráfico y manejar la lógica de consumo -->
    document.addEventListener('DOMContentLoaded', function () {
        // Intentar obtener datos del almacenamiento local; si no existen, establecer un arreglo vacío
        var appliances = JSON.parse(localStorage.getItem('appliances')) || [];
    
        // Esto garantiza que `appliances` tenga un valor, incluso si es un arreglo vacío
        if (!localStorage.getItem('appliances')) {
            localStorage.setItem('appliances', JSON.stringify([]));
        }
    
        // Referencias a los elementos del DOM
        var consumptionChart = document.getElementById('consumptionChart');
        var mostConsumptionMessage = document.getElementById('mostConsumptionMessage');
        var totalConsumptionMessage = document.getElementById('totalConsumptionMessage');
        var weeklyConsumptionMessage = document.getElementById('weeklyConsumptionMessage');
        var monthlyConsumptionMessage = document.getElementById('monthlyConsumptionMessage');
    
        // Verificar si hay datos en `appliances`
        if (appliances.length === 0) {
            // Si no hay datos, muestra un mensaje en el `div` de la gráfica y oculta los mensajes de consumo
            consumptionChart.innerHTML = "<p style='text-align: center; color: gray;'>No hay datos disponibles</p>";
            
            mostConsumptionMessage.style.display = 'none';
            totalConsumptionMessage.style.display = 'none';
            weeklyConsumptionMessage.style.display = 'none';
            monthlyConsumptionMessage.style.display = 'none';
        } else {
            // Si hay datos, genera la gráfica
            var labels = appliances.map(function(appliance) {
                return appliance.brandAppliance;
            });
            var data = appliances.map(function(appliance) {
                return {
                    name: appliance.brandAppliance,
                    y: appliance.monthlyConsumption,
                    sliced: true,
                    selected: true
                };
            });
            var costs = appliances.map(function(appliance) {
                return appliance.cost;
            });
    
            var maxConsumption = Math.max(...data.map(d => d.y));
            var maxIndex = data.findIndex(d => d.y === maxConsumption);
            var mostConsumingAppliance = labels[maxIndex];
            var maxCost = costs[maxIndex];
    
            var totalConsumption = data.reduce((sum, d) => sum + d.y, 0);
            var weeklyConsumption = totalConsumption / 30 * 7;
            var monthlyConsumption = totalConsumption;
    
            mostConsumptionMessage.style.color = 'black';
            totalConsumptionMessage.style.color = 'black';
            weeklyConsumptionMessage.style.color = 'black';
            monthlyConsumptionMessage.style.color = 'black';
    
            mostConsumptionMessage.textContent = `El electrodoméstico con más gasto en kWh es: ${mostConsumingAppliance} con un costo mensual de $${maxCost.toFixed(2)}.`;
    
            if (monthlyConsumption <= 300) {
                monthlyConsumptionMessage.className = 'consumo-bajo';
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${monthlyConsumption.toFixed(2)} kWh. El consumo es bajo.`;
                localStorage.setItem('consumptionLevel', 'bajo');
            } else if (monthlyConsumption <= 900) {
                monthlyConsumptionMessage.className = 'consumo-moderado';
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${monthlyConsumption.toFixed(2)} kWh. El consumo es moderado.`;
                localStorage.setItem('consumptionLevel', 'moderado');
            } else {
                monthlyConsumptionMessage.className = 'consumo-alto';
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${monthlyConsumption.toFixed(2)} kWh. El consumo es alto.`;
                localStorage.setItem('consumptionLevel', 'alto');
            }
    
            totalConsumptionMessage.textContent = `Consumo total diario: ${(totalConsumption / 30).toFixed(2)} kWh.`;
            weeklyConsumptionMessage.textContent = `Consumo total semanal: ${weeklyConsumption.toFixed(2)} kWh.`;
    
            // Ajuste de la posición de la flecha
            var arrow = document.getElementById('consumptionArrow');
            var arrowPosition = (monthlyConsumption / 900) * 100; // Suponiendo que 900 kWh es el máximo
            if (arrowPosition > 100) arrowPosition = 100; // Limitar a 100%
            arrow.style.top = (100 - arrowPosition) + '%'; // Invertir el porcentaje para la posición
    
            // Configuración de la gráfica con Highcharts
            Highcharts.chart('consumptionChart', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0,
                        depth: 70,
                        viewDistance: 25
                    }
                },
                title: {
                    text: 'Consumo Eléctrico por Electrodoméstico'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.percentage:.1f} %',
                            connectorColor: 'silver'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Consumo',
                    data: data
                }]
            });
        }
    });
    </script>
    
@endsection
