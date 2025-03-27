@extends('layouts.plantilla2')

@section('titulo', 'Grafica de Consumo')
@section('UsuariosInfo')
    <title>Gestión de Usuarios</title>
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
</head>
<body>

    <h2><center>Perfil de usuario</center></h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de nacimiento</th>
                <th>Correo</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" value="Alonso" disabled></td>
                <td><input type="text" value="Chávez" disabled></td>
                <td><input type="date" value="2004-04-27" disabled></td>
                <td><input type="email" value="chavezalonso599@gmail.com" disabled></td>
                <td>
                    <button class="edit-btn" onclick="editarFila(this)">Editar</button>
                    <button class="save-btn" onclick="guardarFila(this)" style="display: none;">Guardar</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        function editarFila(boton) {
            let fila = boton.closest("tr");
            let inputs = fila.querySelectorAll("input");
            inputs.forEach(input => input.removeAttribute("disabled"));
            fila.querySelector(".edit-btn").style.display = "none";
            fila.querySelector(".save-btn").style.display = "inline-block";
        }

        function guardarFila(boton) {
            let fila = boton.closest("tr");
            let inputs = fila.querySelectorAll("input");
            inputs.forEach(input => input.setAttribute("disabled", "true"));
            fila.querySelector(".edit-btn").style.display = "inline-block";
            fila.querySelector(".save-btn").style.display = "none";
            alert("Información actualizada correctamente");
        }
    </script>

</body>
@endsection