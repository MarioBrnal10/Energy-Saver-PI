@extends('layouts.plantilla2')

@section('Titulo', 'ChatBot')

@section('contenidoChatbot')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4 text-primary">ChatBot EnergySaver</h3>
                
                <div id="chatbot-container" class="border rounded p-3 mb-3" style="height: 300px; overflow-y: auto;">
                    <p><strong>ChatBot:</strong> Envíame un mensaje para comenzar.</p>
                </div>

                <div class="input-group">
                    <input type="text" id="mensaje-usuario" class="form-control" placeholder="Escribe un mensaje..." autofocus>
                    <button id="enviar-mensaje" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputMensaje = document.getElementById('mensaje-usuario');
    const botonEnviar = document.getElementById('enviar-mensaje');
    const chatContainer = document.getElementById('chatbot-container');

    function agregarMensaje(remitente, mensaje) {
        const nuevoMensaje = document.createElement('p');
        nuevoMensaje.innerHTML = `<strong>${remitente}:</strong> ${mensaje}`;
        chatContainer.appendChild(nuevoMensaje);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function enviarMensaje(mensajeUsuario = null) {
        const mensaje = mensajeUsuario || inputMensaje.value.trim();
        if (!mensaje) return;

        if (!mensajeUsuario) {
            agregarMensaje('Tú', mensaje);
            inputMensaje.value = '';
        }

        fetch('{{ route('chatbot.procesar') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ mensaje: mensaje }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                agregarMensaje('ChatBot', data.message);
                setTimeout(() => { chatContainer.scrollTop = chatContainer.scrollHeight; }, 300); // Enfoque en la respuesta
            }

            setTimeout(() => {
                if (data.options) {
                    mostrarOpciones(data.options);
                }
                if (data.form) {
                    mostrarFormulario(data.form);
                }
            }, 500); // Retraso antes de mostrar menú
        })
        .catch(error => {
            console.error('Error:', error);
            agregarMensaje('ChatBot', 'Hubo un error al procesar tu mensaje. Intenta de nuevo.');
        });
    }

    function mostrarOpciones(opciones) {
        const opcionesContainer = document.createElement('div');
        opcionesContainer.className = 'opciones-container';
        
        opciones.forEach(opcion => {
            const boton = document.createElement('button');
            boton.textContent = opcion.label;
            boton.className = 'btn btn-secondary m-1';
            boton.addEventListener('click', () => {
                agregarMensaje('Tú', opcion.label);
                enviarMensaje(opcion.value);
            });
            opcionesContainer.appendChild(boton);
        });
        
        chatContainer.appendChild(opcionesContainer);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function mostrarFormulario(formulario) {
        const formularioContainer = document.createElement('div');
        formularioContainer.className = 'formulario-container';
        
        formulario.forEach(campo => {
            const inputGroup = document.createElement('div');
            inputGroup.className = 'mb-3';
            
            const label = document.createElement('label');
            label.textContent = campo.label;
            label.className = 'form-label';
            
            const input = document.createElement('input');
            input.type = campo.type;
            input.name = campo.name;
            input.className = 'form-control';
            
            inputGroup.appendChild(label);
            inputGroup.appendChild(input);
            formularioContainer.appendChild(inputGroup);
        });
        
        const botonEnviar = document.createElement('button');
        botonEnviar.textContent = 'Enviar';
        botonEnviar.className = 'btn btn-primary';
        botonEnviar.addEventListener('click', function () {
            const datosFormulario = {};
            formulario.forEach(campo => {
                datosFormulario[campo.name] = formularioContainer.querySelector(`[name="${campo.name}"]`).value;
            });

            fetch('{{ route('chatbot.procesar') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    mensaje: 'guardar_tarjeta',
                    ...datosFormulario,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    agregarMensaje('ChatBot', data.message);
                    setTimeout(() => { chatContainer.scrollTop = chatContainer.scrollHeight; }, 300);
                }
                setTimeout(() => {
                    if (data.options) {
                        mostrarOpciones(data.options);
                    }
                }, 500);
            })
            .catch(error => {
                console.error('Error:', error);
                agregarMensaje('ChatBot', 'Hubo un error al procesar los datos. Intenta de nuevo.');
            });
        });
        
        formularioContainer.appendChild(botonEnviar);
        chatContainer.appendChild(formularioContainer);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    botonEnviar.addEventListener('click', () => enviarMensaje());
    inputMensaje.addEventListener('keypress', event => {
        if (event.key === 'Enter') enviarMensaje();
    });
});
</script>
@endsection