@extends('layouts.plantilla2')

@section('titulo', 'Consejos y Recomendaciones')
    @section('css-estilo')
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <link rel="stylesheet" href="{{asset('css/grafica.css')}}">
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    @endsection

    @section('contenidoConsejos')
    <div class="recomendaciones-container">
        <h1>Consejos y Recomendaciones</h1>
        <div class="row" id="recomendacionesList">
            <!-- Las recomendaciones se cargarán aquí -->
        </div>
        <div class="button-container transparent-container mt-4">
            <button class="btn btn-primary" onclick="location.href='{{route('rutaVisual')}}'">Volver a la Gráfica</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var consumptionLevel = localStorage.getItem('consumptionLevel');
            var recomendacionesList = document.getElementById('recomendacionesList');

            var recomendaciones = {
                bajo: [
                    "Utilice iluminación LED de alta eficiencia para todas sus necesidades de iluminación.",
                    "Aproveche la luz natural tanto como sea posible para reducir el uso de electricidad.",
                    "Desenchufe los dispositivos electrónicos cuando no estén en uso para evitar el consumo en modo standby.",
                    "Instale temporizadores o sensores de movimiento para las luces en áreas comunes.",
                    "Realice mantenimiento regular a sus electrodomésticos para asegurar su eficiencia.",
                    "Ajuste el termostato a una temperatura eficiente tanto en verano como en invierno.",
                    "Utilice ventiladores de techo en lugar de aire acondicionado siempre que sea posible.",
                    "Aísle su hogar adecuadamente para mantener la temperatura interior sin recurrir a la calefacción o refrigeración excesiva.",
                    "Lave la ropa en ciclos cortos y con agua fría para ahorrar energía.",
                    "Seque la ropa al aire libre en lugar de utilizar la secadora.",
                    "Reemplace los filtros del aire acondicionado regularmente.",
                    "Utilice electrodomésticos certificados con Energy Star.",
                    "Instale cortinas térmicas para mantener la temperatura interior.",
                    "Utilice regletas de enchufes inteligentes para gestionar el consumo de múltiples dispositivos.",
                    "Apague las luces y dispositivos electrónicos cuando no estén en uso.",
                    "Utilice programas de ahorro de energía en su lavadora y lavavajillas.",
                    "Ajuste la temperatura del calentador de agua a un nivel eficiente.",
                    "Realice auditorías energéticas periódicas para identificar áreas de mejora.",
                    "Invierta en electrodomésticos de alta eficiencia energética.",
                    "Implemente un sistema de gestión de energía en su hogar."
                ],
                moderado: [
                    "Realice auditorías energéticas profesionales para identificar oportunidades de ahorro de energía.",
                    "Instale termostatos programables para optimizar el uso de calefacción y aire acondicionado.",
                    "Utilice electrodomésticos de alta eficiencia energética en todas las áreas de su hogar.",
                    "Aisle adecuadamente su hogar para reducir las pérdidas de calor y frío.",
                    "Reemplace ventanas antiguas por modelos de doble acristalamiento para mejorar el aislamiento.",
                    "Utilice sistemas de iluminación inteligente para reducir el consumo energético.",
                    "Apague completamente los dispositivos electrónicos en lugar de dejarlos en modo standby.",
                    "Instale paneles solares para generar energía renovable y reducir la dependencia de la red eléctrica.",
                    "Optimice el uso de la calefacción y aire acondicionado mediante el uso de termostatos programables.",
                    "Use ventiladores de techo para mejorar la circulación del aire y reducir la necesidad de aire acondicionado.",
                    "Utilice electrodomésticos con certificación Energy Star.",
                    "Implementar un sistema de gestión de energía para monitorear y controlar el consumo energético en tiempo real.",
                    "Instale sensores de movimiento para las luces en áreas de poco uso.",
                    "Reduzca el uso del aire acondicionado y utilice ventiladores cuando sea posible.",
                    "Utilice cortinas y persianas para bloquear el calor del sol durante el verano.",
                    "Aproveche la ventilación natural para reducir la necesidad de refrigeración artificial.",
                    "Realice mantenimiento regular a su sistema de calefacción y aire acondicionado.",
                    "Optimice el uso de la lavadora y lavavajillas utilizándolos solo con carga completa.",
                    "Reduzca el tiempo de uso del horno eléctrico y utilice métodos de cocción alternativos.",
                    "Cree hábitos de consumo energético responsables entre todos los miembros del hogar."
                ],
                alto: [
                    "Considere la instalación de sistemas de energía renovable como paneles solares o turbinas eólicas.",
                    "Reemplace los sistemas de calefacción y refrigeración antiguos por bombas de calor de alta eficiencia.",
                    "Utilice sistemas de domótica para controlar y reducir el consumo energético en su hogar.",
                    "Realice auditorías energéticas periódicas con un profesional para identificar áreas de mejora.",
                    "Invierta en electrodomésticos de última generación con alta eficiencia energética.",
                    "Instale aislantes térmicos avanzados en paredes, techos y pisos para mejorar el aislamiento.",
                    "Implemente un programa de mantenimiento regular para todos los sistemas energéticos de su hogar.",
                    "Cámbiese a tarifas de electricidad que premian el consumo en horas valle.",
                    "Promueva el uso de transporte eléctrico y estaciones de carga en su hogar.",
                    "Participe en programas de ahorro energético ofrecidos por su proveedor de energía.",
                    "Utilice aplicaciones de monitoreo del consumo energético para identificar patrones y oportunidades de ahorro.",
                    "Invierta en sistemas de almacenamiento de energía para aprovechar al máximo la energía renovable generada.",
                    "Utilice iluminación natural siempre que sea posible y complemente con iluminación LED.",
                    "Optimice el uso de la calefacción y aire acondicionado mediante el uso de termostatos inteligentes.",
                    "Reemplace electrodomésticos viejos por modelos más eficientes y de menor consumo energético.",
                    "Utilice cortinas térmicas y persianas para mejorar el aislamiento de las ventanas.",
                    "Aproveche la energía solar pasiva mediante el diseño arquitectónico de su hogar.",
                    "Fomente la cultura del ahorro energético entre los miembros de su hogar.",
                    "Establezca metas de reducción de consumo energético y realice un seguimiento regular de su progreso.",
                    "Participe en programas de certificación energética para su hogar y siga las recomendaciones proporcionadas."
                ]
            };

            if (consumptionLevel && recomendaciones[consumptionLevel]) {
                recomendaciones[consumptionLevel].forEach(function(consejo) {
                    var card = document.createElement('div');
                    card.className = 'col-md-4 mb-3';
                    card.innerHTML = `
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">${consejo}</p>
                            </div>
                        </div>
                    `;
                    recomendacionesList.appendChild(card);
                });
            } else {
                var card = document.createElement('div');
                card.className = 'col-md-12';
                card.innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">No hay recomendaciones disponibles.</p>
                        </div>
                    </div>
                `;
                recomendacionesList.appendChild(card);
            }
        });
    </script>
    
@endsection