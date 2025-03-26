@extends('layouts.plantilla2')

@section('Titulo', 'Usuarios')

@section('EditarUsuarios')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    .edit-btn, .save-btn {
        cursor: pointer;
        padding: 5px 10px;
        margin: 2px;
    }
    .edit-btn {
        background-color: #f0ad4e;
        color: white;
    }
    .save-btn {
        background-color: #5cb85c;
        color: white;
    }
    input {
        width: 90%;
        border: none;
        text-align: center;
    }
</style>

<h2><center>Información del usuario</center></h2>
@foreach ($usuario as $usuario)
<form id="updateForm" action="{{ route('usuario.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de nacimiento</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="nombre" value="{{ $usuario->Nombre }}" disabled></td>
                <td><input type="text" name="apellidos" value="{{ $usuario->Apellidos }}" disabled></td>
                <td><input type="date" name="fecha_nacimiento" value="{{ $usuario->Fecha_nacimiento }}" disabled></td>
                <td><input type="email" name="correo" value="{{ $usuario->Correo }}" disabled></td>
                <td><input type="password" name="contraseña" placeholder="Nueva contraseña" disabled></td>
                <td>
                    <button type="button" class="edit-btn" onclick="editarFila(this)">Editar</button>
                    <button type="submit" class="save-btn" style="display: none;">Guardar</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endforeach

<script>
    function editarFila(boton) {
        let fila = boton.closest("tr");
        let inputs = fila.querySelectorAll("input");
        inputs.forEach(input => input.removeAttribute("disabled"));
        fila.querySelector(".edit-btn").style.display = "none";
        fila.querySelector(".save-btn").style.display = "inline-block";
    }
</script>
@endsection
