@extends('layouts.plantilla2')

@section('titulo', 'Vinculaciones')
@section('css-estilos')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('contenidoVinculacion')
    <!-- Componente Ferman Energy -->
    <x-vinvulaciones encabezado="Paneles Solares" txtboton="Más Información En Ferman Energy" carac1="Reducir significativamente tus facturas de electricidad." carac2="Contribuir a la protección del medio ambiente." carac3="Aumentar la eficiencia energética de tu hogar o negocio." imagen="{{ asset('img/F1.webp') }}">
        Los paneles solares son una solución eficiente y sostenible para el consumo energético. Utilizan la energía del sol para generar electricidad, reduciendo así la dependencia de fuentes de energía no renovables y disminuyendo las emisiones de carbono.
        En Energy Saver, te brindamos la información necesaria para que puedas acceder y conocer más sobre los paneles solares.
    </x-vinvulaciones>
    
    <!-- Componente Producto Futuro -->
    <x-vinvulaciones encabezado="Producto Futuro" txtboton="Más Información">
        Aqui va la descripcion de Productos o Empresas futuras.
    </x-vinvulaciones>
@endsection
