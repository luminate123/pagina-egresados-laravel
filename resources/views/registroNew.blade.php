<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Egresados Registro</title>
</head>

<body>
    <div class="grid grid-cols-5 h-full bg-blueUNT">

        <div class="px-12">
            <img src="/logoUNT.png" alt="Logo Universidad Nacional de Trujillo"/>
            <h1 class='font-serif text-xs text-center text-white'>UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
        </div>


        <div class="bg-white px-10 col-span-3 pb-40">

            <h2 class="mt-5 text-left text-4xl font-semibold leading-9 tracking-tight text-gray-900">Registrarse</h2>
            <h3 class="mb-5 mt-2 text-left text-2xl leading-9 tracking-tight text-gray-900">Ingrese sus datos personales</h3>

            <form class="space-y-6" method="POST" id="dniForm">
                <div class="grid">
                    <label for="dni" class="block text-lg font-medium leading-6 text-gray-900">Ingrese su DNI</label>
                    <div class="relative mt-2">
                        <input id="dni" name="dni" type="text" required maxlength="8" class="bg-white block w-full pl-3 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div id="loading" class="absolute inset-y-0 right-5 flex items-center hidden">
                            <div class="border-gray-300 h-6 w-6 animate-spin rounded-full border-4 border-t-blue-600" role="status"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-between">
                    <div class="grid">
                        <label for="Nombres" class="block text-lg font-medium leading-6 text-gray-900">Nombres</label>
                        <div class="mt-2">
                            <input id="Nombres" name="Nombres" disabled type="text" placeholder="" required class="bg-gray-300 block w-full pl-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="grid">
                        <label for="ApellidoPaterno" class="block text-lg font-medium leading-6 text-gray-900">Apellido Paterno</label>
                        <div class="mt-2">
                            <input id="ApellidoPaterno" name="ApellidoPaterno" disabled type="text" placeholder="" required class="bg-gray-300 block w-full pl-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="grid">
                        <label for="ApellidoMaterno" class="block text-lg font-medium leading-6 text-gray-900">Apellido Materno</label>
                        <div class="mt-2">
                            <input id="ApellidoMaterno" name="ApellidoMaterno" disabled type="text" placeholder="" required class="bg-gray-300 block w-full pl-5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                
                <div class="grid">
                    <label for="fechaNacimiento" class="block text-lg font-medium leading-6 text-gray-900">Fecha de Nacimiento</label>
                    <div class="relative mt-2">
                        <input id="fechaNacimiento" name="fechaNacimiento" type="date" required class="bg-white block w-full pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="grid">
                    <label class="block text-lg font-medium leading-6 text-gray-900">Género</label>
                    <div class="mt-2 flex items-center">
                        <input id="generoM" name="genero" type="radio" value="M" required class="h-4 w-4 bg-blue-600 border-gray-300 focus:ring-indigo-600">
                        <label for="generoM" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Masculino</label>
                    </div>
                    <div class="mt-2 flex items-center">
                        <input id="generoF" name="genero" type="radio" value="F" required class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                        <label for="generoF" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Femenino</label>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-x-5">
                    <button class="flex w-full justify-center rounded-md bg-yellowUNT px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellowUNT-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Volver</button>
                    <button id="submitBtn" type="submit" class="flex w-full justify-center rounded-md bg-blueUNT px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blueUNT-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrate</button>
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
