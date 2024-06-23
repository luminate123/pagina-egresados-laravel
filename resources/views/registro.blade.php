<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="/logoUNT.png" alt="Your Company">
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">REGISTRO</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" id="dniForm">
                <div class="grid">
                    <label for="dni" class="block text-sm font-medium leading-6 text-gray-900">Ingrese su dni</label>
                    <div class="relative mt-2">
                        <input id="dni" name="dni" type="text" required maxlength="8" class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="loading" class="absolute inset-y-0 right-5 flex items-center hidden">
                            <div class="border-gray-300 h-6 w-6 animate-spin rounded-full border-4 border-t-blue-600" role="status"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-between">
                    <div class="grid">
                        <label for="Nombres" class="block text-sm font-medium leading-6 text-gray-900">Nombres</label>
                        <div class="mt-2">
                            <input id="Nombres" name="Nombres" disabled type="text" placeholder="" required class="block w-full pl-5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="grid">
                        <label for="ApellidoPaterno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Paterno</label>
                        <div class="mt-2">
                            <input id="ApellidoPaterno" name="ApellidoPaterno" disabled type="text" placeholder="" required class="block w-full pl-5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="grid mt-6">
                        <label for="ApellidoMaterno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Materno</label>
                        <div class="mt-2">
                            <input id="ApellidoMaterno" name="ApellidoMaterno" disabled type="text" placeholder="" required class="block w-full pl-5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div>
                    <button id="submitBtn" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrate</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
               ¿Ya tienes una cuenta?
                <a href="/" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Iniciar Sesión</a>
            </p>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dniInput = document.getElementById('dni');
        const submitBtn = document.getElementById('submitBtn');
        const loadingIndicator = document.getElementById('loading');
        const form = document.getElementById('dniForm');

        if (dniInput) {
            dniInput.addEventListener('input', function() {
                const dni = this.value;
                if (dni.length === 8) {
                    // Mostrar el indicador de carga y deshabilitar el campo de entrada
                    loadingIndicator.classList.remove('hidden');
                    dniInput.disabled = true;
                    submitBtn.disabled = true;

                    fetch(`/consulta-dni/${dni}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Respuesta de red no fue ok.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Asegurarse de que los elementos existan antes de asignar valores
                            const nombresInput = document.getElementById('Nombres');
                            const apellidoPaternoInput = document.getElementById('ApellidoPaterno');
                            const apellidoMaternoInput = document.getElementById('ApellidoMaterno');
                            if (nombresInput && data.nombres) {
                                nombresInput.value = data.nombres;
                                nombresInput.disabled = false; // Habilitar el campo si estaba deshabilitado
                            }
                            if (apellidoPaternoInput && data.apellidoPaterno) {
                                apellidoPaternoInput.value = data.apellidoPaterno;
                                apellidoPaternoInput.disabled = false; // Habilitar el campo si estaba deshabilitado
                            }
                            if (apellidoMaternoInput && data.apellidoMaterno) {
                                apellidoMaternoInput.value = data.apellidoMaterno;
                                apellidoMaternoInput.disabled = false; // Habilitar el campo si estaba deshabilitado
                            }
                        })
                        .catch(error => {
                            console.error('Error al obtener los datos:', error);
                            // Considerar mostrar un mensaje de error al usuario aquí
                        })
                        .finally(() => {
                            // Ocultar el indicador de carga y habilitar el campo de entrada
                            loadingIndicator.classList.add('hidden');
                            dniInput.disabled = false;
                            submitBtn.disabled = false;
                        });
                }
            });
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            const formData = new FormData(form);

            fetch('/registro', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then(data => {
                console.log('Registro exitoso:', data);
                // Aquí puedes redirigir al usuario o mostrar un mensaje de éxito
            })
            .catch(error => {
                console.error('Error al registrar:', error);
                // Aquí puedes mostrar un mensaje de error al usuario
            });
        });
    });
</script>

</html>
