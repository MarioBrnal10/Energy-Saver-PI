@extends('layouts.plantilla2')

@section('titulo', 'Home')

@section('css-estilos')
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
@endsection

@section('contenidoHome')

<div class="container">
    <h1>Bienvenido a Energy Saver</h1>
    <p>Nuestra misión es ayudarte a conocer más a detalle el consumo eléctrico de tu hogar, ofreciéndote recomendaciones que te permitan reducir el consumo y ahorrar en tus facturas de energía.</p>
    <p>En nuestra página podrás:</p>
    <ul>
        <li>Encontrar consejos prácticos y guías para reducir el consumo energético y mejorar la eficiencia energética en tu hogar.</li>
        <li>Contactar con nosotros para recibir asesoramiento personalizado y resolver cualquier duda que puedas tener.</li>
        <li>Conocer acerca de energías renovables y ponerte en contacto con la empresas para brindarte más información si es de tu interés.</li>
    </ul>
    <p>¡Empieza hoy mismo tu camino hacia un hogar más eficiente y sostenible con Energy Saver!</p>
</div>

@endsection
