@extends('layouts.plantilla1')

@section('titulo', 'Registro')
    
@section('css-formulario')
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
@endsection



@section('formulario')
<body style="margin: 0; font-family: Arial, sans-serif; background: url('{{ asset('img/Fondo.jpg') }}') no-repeat center center fixed; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; color: #fff;">

    
    <div class="form-container">
        <h1>Registro</h1>
        
        <form  action="{{ route('EnviarRegistro') }}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            <small class="fst-italic text-danger">{{ $errors->first('nombre') }}</small>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            <small class="fst-italic text-danger">{{ $errors->first('apellidos') }}</small>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            <small class="fst-italic text-danger">{{ $errors->first('fecha_nacimiento') }}</small>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
            <small class="fst-italic text-danger">{{ $errors->first('correo') }}</small>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            <small class="fst-italic text-danger">{{ $errors->first('password') }}</small>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="password_confirmation">
            <small class="fst-italic text-danger">{{ $errors->first('confirm_password') }}</small>

            <button type="submit">Registrar</button>
            <button type="button" class="btn" onclick="window.location.href='{{ route('rutaInicio') }}'">Regresar a Inicio</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="{{ route('rutaLogin') }}">Inicia sesión aquí</a></p>
    </div>

    
    
</body>
@endsection
