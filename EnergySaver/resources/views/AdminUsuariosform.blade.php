@extends('layouts.plantillaAdmin')

@section('titulo', 'Registro de Administrador')

@section('contenidoUsuariosAdminForm')
    @if (session('exito'))
        <script>
            Swal.fire({
                title: "Usuario Registrado Con Éxito!",
                text: '{{ session('exito') }}',
                icon: "success"
            });
        </script>
    @endif
    @section('css-AdminUsuariosForm')
    <link rel="stylesheet" href="{{ asset('css/AdminUsuariosForm.css') }}">
@endsection
    <div class="form-container bg-light p-4 rounded shadow">
        <h1 class="text-center text-dark mb-4">Registro de Administrador</h1>
        <form action="{{ route('EnviarAdmin') }}" method="POST">
            @csrf
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control mb-3" >
            <small class="text-danger">{{ $errors->first('nombre') }}</small>

            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" class="form-control mb-3" >
            <small class="text-danger">{{ $errors->first('apellidos') }}</small>

            <label for="correo" class="form-label">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}" class="form-control mb-3" >
            <small class="text-danger">{{ $errors->first('correo') }}</small>

            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control mb-3" >
            <small class="text-danger">{{ $errors->first('password') }}</small>

            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control mb-3" >
            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>

            <label for="Id_genero" class="form-label">Género:</label>
            <select id="Id_genero" name="Id_genero" class="form-select mb-3" >
                <option value="" disabled selected>Selecciona tu género</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('Id_genero') == $genero->id ? 'selected' : '' }}>
                        {{ ucfirst($genero->nombre) }}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('Id_genero') }}</small>

            <button type="submit" class="btn btn-primary w-100">Registrar Administrador</button>
        </form>
        <a href="{{ route('rutaAdmisVisualizacion') }}" class="btn btn-primary mt-3 w-100">Ver Administradores</a>
    </div>
@endsection
