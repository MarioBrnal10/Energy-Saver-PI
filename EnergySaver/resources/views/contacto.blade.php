@extends('layouts.plantilla2')

@section('titulo', 'Contacto')
    @section('css-estilos')
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    @endsection
    
    @section('contenidoContacto')
    <div class="container mt-5">
        <h1 class="text-center text-bg-warning">Contactos</h1>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <div class="card-body text-center">
                        <h5 class="card-title">Teléfono</h5>
                        <p class="card-text">4411519805</p>
                        <p class="card-text">Horario de Atención: 8 am a 6 pm</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto">
                    <div class="card-body text-center">
                        <h5 class="card-title">Correo Electrónico</h5>
                        <p class="card-text">EnergySaver@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Formulario de Contacto</h5>
                        <form action="{{route('enviaMensaje')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{('Nombre')}}</label>
                                <input type="text" class="form-control"  name="nombre" placeholder="Introduce tu nombre" value={{ old('nombre') }}>
                                <small class="fst-italic text-danger" >{{ $errors->first('nombre') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control"  name="correo" placeholder="Introduce tu correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje</label>
                                <textarea class="form-control"  name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío del formulario
            
            var formData = new FormData(this);

            fetch('enviar_contacto.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                if (data === "Mensaje enviado correctamente") {
                    document.getElementById('contactForm').reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection