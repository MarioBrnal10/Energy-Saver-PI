@extends('layouts.plantilla1')

@section('titulo', 'Inicio De Sesion')

@section('css-login')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('login')
<body style="margin: 0; font-family: Arial, sans-serif; background: url('img/Fondo.jpg') no-repeat center center fixed; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; color: #fff;">
    
    


    <div class="login-container">
        <div class="login-form">
            <h1>Inicio de Sesión</h1>
            @session('exito')
            <script>
              Swal.fire({
                title: "Usuario Registrado Con Exito!",
                text: '{{ $value }}',
                icon: "success"
              });

            </script>
            @endsession
            <form action="/entrar" method="POST">
                @csrf
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
                <small class="fst-italic text-danger">{{ $errors->first('correo') }}</small>
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" value="{{ old('contraseña') }}">
                <small class="fst-italic text-danger">{{ $errors->first('contraseña') }}</small>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recuérdame</label>
                </div>
                <button type="submit">Entrar</button>
                <button class="btn" onclick="window.location.href='{{ route('rutaInicio') }}'">Regresar a Inicio</button>
            </form>
        </div>
        <div class="login-bg"></div>
    </div>
    
@endsection
