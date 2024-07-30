            <!-- Paso 1: Incluir CSS y JS de Dropzone -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.min.js"></script>

            <meta name="csrf-token" content="{{ csrf_token()  ?? ''}}">
            <div class="">
                <div class="mb-1 border-b border-gray-200 dark:border-gray-700 top-0 bg-white dark:bg-gray-800">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Datos Academicos</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Datos Profesionales</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Certificados</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="flex justify-center space-x-4">
                            <div class="grid">
                                <label for="DNI" class="block text-sm font-medium leading-6 text-gray-900">DNI</label>
                                <div class="mt-2">
                                    <input id="DNI" name="DNI" type="text" value="{{$DNI ?? ''}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="grid">
                                <label for="Nombres" class="block text-sm font-medium leading-6 text-gray-900">Nombres</label>
                                <div class="mt-2">
                                    <input id="Nombres" name="Nombres" type="text" value="{{$Nombres ?? ''}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="grid">
                                <label for="Apellido Paterno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Paterno</label>
                                <div class="mt-2">
                                    <input id="Apellido Paterno" name="Apellido Paterno" type="text" value="{{$Ap_Paterno ?? ''}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="grid">
                                <label for="Apellido Materno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Materno</label>
                                <div class="mt-2">
                                    <input id="Apellido Materno" name="Apellido Materno" type="text" value="{{$Ap_Materno ?? ''}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        <div class=" grid justify-center p-6 space-y-4">
                            <form method="POST" action="{{$action1 ?? ''}}">
                                @csrf

                                {{$patch ?? ''}}
                                <div class="flex space-x-4  ">
                                    <div class="grid">
                                        <label for="fecha_nacimiento" class="block text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</label>
                                        <div class="mt-2">
                                            <input id="fecha_nacimiento" name="fecha_nacimiento" type="{{$tipo_date ?? ''}}" value="{{$fecha ?? ''}}" required {{$prop ?? ''}} class="bg-white block w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="grid ">
                                        <label for="Genero" class="block text-sm font-medium leading-6 text-gray-900">Genero</label>
                                        <div class="flex pt-1">
                                            <div class="form-control">
                                                <label class="label cursor-pointer space-x-3">
                                                    <span class="label-text">Masculino</span>
                                                    <input type="radio" id="genero" name="genero" value="Masculino" required class="radio checked:bg-blue-500" {{$prop1 ?? ''}} {{$prop ?? ''}} />
                                                </label>
                                            </div>
                                            <div class="form-control">
                                                <label class="label cursor-pointer space-x-3">
                                                    <span class="label-text">Femenino</span>
                                                    <input id="genero" type="radio" name="genero" value="Femenino" required class="radio checked:bg-blue-500" {{$prop2 ?? ''}} {{$prop ?? ''}} />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-4 mt-4">
                                    <div class="grid justify-items-start">
                                        <label for="nacionalidad" class="block text-sm font-medium leading-6 text-gray-900">Nacionalidad</label>
                                        <div class="mt-2">
                                            <input id="nacionalidad" name="nacional" type="text" value="{{$nacionalidad ?? ''}}" required {{$prop ?? ''}} class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="grid justify-items-start">
                                        <label for="telefono" class="block text-sm font-medium leading-6 text-gray-900">Telefono celular</label>
                                        <div class="mt-2">
                                            <input id="telefono" name="telefono" type="tel" pattern="[0-9]{9}" value="{{$telefono ?? ''}}" required {{$prop ?? ''}} class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="grid justify-items-start">
                                        <label for="correo" class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                                        <div class="mt-2">
                                            <input id="correo" name="correo" type="email" value="{{$correo ?? ''}}" required {{$prop ?? ''}} class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button id="updateBtn" type="button" class="{{!$hidden1 ?? ''}} {{$hidden2 ?? ''}} flex w-full justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500 ">Actualizar</button>
                                    <button id="submitBtn" type="submit" class="{{$hidden1 ?? ''}} {{!$hidden2 ?? ''}} flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Guardar</button>



                                </div>
                            </form>
                            {{$scripttoast ?? ''}}
                        </div>
                        {{ $function ?? ''  ?? ''}}
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="grid justify-center space-y-3">
                            <form method="POST" action="{{ $actionacad  ?? ''}}">
                                @csrf
                                {{$patchacad ?? ''}}
                                <div class="grid">
                                    <label for="año_egreso" class="block text-sm font-medium leading-6 text-gray-900">Año de egreso</label>
                                    <div class="mt-2">
                                        <input {{$propacad ?? ''}} required id="año_egreso" name="año_egreso" type="{{$tipo_dateacad ?? ''}}" value="{{$aegre ?? ''}}" class="bg-white block min-w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="flex justify-center space-x-4">
                                    <div class="grid">
                                        <label for="bachiller_academico" class="block text-sm font-medium leading-6 text-gray-900">Bachiller académico</label>
                                        <div class="mt-2">
                                            <select {{$propacad ?? ''}} required id="bachiller_academico" name="bachiller_academico" class="bg-white block w-44 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <option value="" hidden disabled {{$Bachiller ? '' : 'selected' ?? ''}}>Seleccione una opción</option>
                                                <option value="Si" {{$Bachiller == 'Si' ? 'selected' : '' ?? ''}}>Si</option>
                                                <option value="No" {{$Bachiller == 'No' ? 'selected' : '' ?? ''}}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid">
                                        <label for="titulo_academico" class="block text-sm font-medium leading-6 text-gray-900">Título académico</label>
                                        <div class="mt-2">
                                            <select {{$propacad ?? ''}} required id="titulo_academico" name="titulo_academico" class="bg-white block w-44 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <option value="" hidden disabled {{$titulo ? '' : 'selected' ?? ''}}>Seleccione una opción</option>
                                                <option value="Si" {{$titulo == 'Si' ? 'selected' : '' ?? ''}}>Si</option>
                                                <option value="No" {{$titulo == 'No' ? 'selected' : '' ?? ''}}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid">
                                    <label for="maestria" class="block text-sm font-medium leading-6 text-gray-900">Maestria</label>
                                    <div class="mt-2">
                                        <input {{$propacad ?? ''}} required id="maestria" name="maestria" type="text" value="{{$maestria ?? ''}}" class="bg-white block min-w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="grid">
                                    <label for="doctorado" class="block text-sm font-medium leading-6 text-gray-900">Doctorado</label>
                                    <div class="mt-2">
                                        <input {{$propacad ?? ''}} required id="doctorado" name="doctorado" type="text" value="{{$doctorado ?? ''}}" class="bg-white block min-w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button id="updateBtnacad" type="button" class="{{!$hidden1acad ?? ''}} {{$hidden2acad ?? ''}} flex w-full justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500 ">Actualizar</button>
                                    <button id="submitBtnacad" type="submit" class="{{$hidden1acad ?? ''}} {{!$hidden2acad ?? ''}} flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Guardar</button>

                                </div>
                            </form>
                            {{$scripttoast1 ?? ''}}
                        </div>
                        {{ $functionacad ?? ''  ?? ''}}
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="grid justify-center space-y-3">
                            <div class="card bg-base-100 w-auto shadow-2xl border-2 border-blue-500">
                                <div class="p-3 flex justify-between">
                                    <h2 class="card-title text-sm">CV - Actual</h2>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary" onclick="my_modal_1.showModal()">Abrir</button>
                                        <dialog id="my_modal_1" class="modal">
                                            <div class="modal-box max-w-4xl">
                                                <!-- aqui -->
                                                {{$message ?? ''}}
                                                <div class="modal-action">
                                                    <form method="dialog">
                                                        <!-- if there is a button in form, it will close the modal -->
                                                        <button class="btn">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </div>
                                </div>
                            </div>
                            <form id="mainForm" action="{{$actionprofesional ?? ''}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{$patchprof ?? ''}}
                                <label for="situacion_laboral" class="block text-sm font-medium leading-6 text-gray-900">Situación Laboral</label>
                                <div class="flex pt-1 space-x-10">
                                    <div class="form-control">
                                        <label class="label cursor-pointer space-x-3">
                                            <span class="label-text">Empleado</span>
                                            <input type="radio" id="situacion_laboral" required name="situacion_laboral" value="Empleado" class="radio checked:bg-blue-500" {{$prop1prof ?? ''}} {{$disableprof ?? ''}} />
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer space-x-3">
                                            <span class="label-text">Desempleado</span>
                                            <input type="radio" id="situacion_laboral" required name="situacion_laboral" value="Desempleado" class="radio checked:bg-blue-500" {{$prop2prof ?? ''}} {{$disableprof ?? ''}} />
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer space-x-3">
                                            <span class="label-text">Freelance</span>
                                            <input type="radio" id="situacion_laboral" required name="situacion_laboral" value="Freelance" class="radio checked:bg-blue-500" {{$prop3prof ?? ''}} {{$disableprof ?? ''}} />
                                        </label>
                                    </div>
                                </div>
                                <div class="grid">
                                    <label for="empresa_actual" class="block text-sm font-medium leading-6 text-gray-900">Empresa Actual</label>
                                    <div class="mt-2">
                                        <input id="empresa_actual" name="empresa_actual" required type="text" value="{{$empresa ?? ''}}" {{$disableprof ?? ''}} class="bg-white block min-w-full p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="grid">
                                    <label for="puesto_actual" class="block text-sm font-medium leading-6 text-gray-900">Puesto Actual</label>
                                    <div class="mt-2">
                                        <input id="puesto_actual" name="puesto_actual" required type="text" value="{{$puesto ?? ''}}" {{$disableprof ?? ''}} class="bg-white block min-w-full p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="grid">
                                    <label for="sector_empresa_actual" class="block text-sm font-medium leading-6 text-gray-900">Sector de la Empresa</label>
                                    <div class="mt-2">
                                        <input id="sector_empresa_actual" required name="sector_empresa_actual" value="{{$sector ?? ''}}" {{$disableprof ?? ''}} type="text" class="bg-white block min-w-full p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="grid">
                                    <label for="redes_sociales" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn o Portafolio Web</label>
                                    <div class="mt-2">
                                        <input id="redes_sociales" name="redes_sociales" required type="url" value="{{$link ?? ''}}" {{$disableprof ?? ''}} class="bg-white block min-w-full p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button id="updateBtnprof" type="button" class="{{!$hidden1prof ?? ''}} {{$hidden2prof ?? ''}} flex w-full justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500 ">Actualizar</button>
                                    <button id="submitBtnprof" onclick="submitForms()" class="{{$hidden1prof ?? ''}} {{!$hidden2prof ?? ''}}  flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Guardar</button>
                                </div>
                            </form>

                            {{$scripttoast2 ?? ''}}
                            <button class="btn {{$hiddenmodal ?? '' }}" onclick="my_modal_3.showModal()">Subir CV</button>
                            <dialog id="my_modal_3" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex items-center justify-center w-auto">
                                        <div id="curriculumdiv" class="grid {{$hidden1curri ?? ''}}">
                                            <label for="curriculum" class="block text-sm font-medium leading-6 text-gray-900 ">Curriculum Vitae - CV</label>
                                            <form action="{{$actiondrop ?? ''}}" method="post" class="dropzone" id="myDropzone" enctype="multipart/form-data">
                                                @csrf
                                                {{$patchcurr ?? ''}}
                                                <div class="fallback">
                                                    <input name="file" type="file" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </dialog>
                        </div>
                        {{ $functionprof ?? ''}}
                        {{ $curriculum ?? ''}}
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <div class="grid justify-center space-y-3">
                            <form method="POST" action="{{$certaccion ?? ''}}">
                                @csrf
                                <div class="grid">
                                    <label for="nombrecer" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                    <div class="mt-2">
                                        <input id="nombrecer" name="nombrecer" required type="text" value="" class="bg-white block min-w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="grid mt-4">
                                    <label for="descripcioncer" class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
                                    <div class="mt-2">
                                        <input id="descripcioncer" name="descripcioncer" required type="text" value="" class="bg-white block min-w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="flex space-x-4 mt-5">
                                    <button id="" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Guardar</button>
                                </div>
                            </form>
                            {{$scripttoast3 ?? ''}}
                            <div class="grid mt-4">
                                {{$certificadocar ?? ''}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <script>
                //funcion para que se quede en el tab que se selecciono

                document.addEventListener('DOMContentLoaded', () => {
                    const tabs = document.querySelectorAll('[data-tabs-target]');
                    const activeTabClass = 'active-tab'; // Define your active tab class

                    tabs.forEach(tab => {
                        tab.addEventListener('click', () => {
                            const target = tab.getAttribute('data-tabs-target');
                            localStorage.setItem('activeTab', target);
                        });
                    });

                    // Restaurar la pestaña activa al cargar la página
                    const activeTab = localStorage.getItem('activeTab');
                    if (activeTab) {
                        document.querySelector(`[data-tabs-target="${activeTab}"]`).click();
                    }
                });



                Dropzone.options.myDropzone = {
                    paramName: 'curriculum', // El nombre que se usará para transferir el archivo
                    maxFilesize: 15, // MB
                    acceptedFiles: '.pdf',
                    autoProcessQueue: true,
                    maxFiles: 1,
                    dictDefaultMessage: 'Arrastra y suelta tu CV aquí o haz clic para subirlo',
                    createImageThumbnails: true,
                    init: function() {
                        var myDropzone = this;

                        myDropzone.on("addedfile", function(file) {
                            if (this.files.length > 1) {
                                this.removeFile(this.files[0]);
                            }
                        });
                        myDropzone.on('sending', function(file, xhr, formData) {
                            // Append all form inputs to the formData Dropzone will send
                            document.querySelectorAll('#mainForm input').forEach(function(input) {
                                formData.append(input.name, input.value);
                            });
                            formData.append('originalName', file.name);
                        });

                        myDropzone.on('success', function(file, response) {
                            console.log('Archivo subido exitosamente');
                            file.id = response.id; // Asume que la respuesta contiene el ID del archivo subido
                            //recarga la pagina despues de 3 segundos
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                            // Crear botón de eliminar
                            var removeButton = Dropzone.createElement('<button type="button" class="mt-5 flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg></button>');

                            // Añadir manejador de evento al botón de eliminar
                            removeButton.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();

                                // Realizar solicitud al servidor para eliminar el archivo
                                fetch('/api/delcurriculums/' + <?php echo $usuarioID ?>, { // Asegúrate de reemplazar '/api/curriculums/' con tu ruta real
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Necesario para Laravel
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Asumiendo que el servidor devuelve { success: true } para una eliminación exitosa
                                        if (data.success === true) { // Asegúrate de que esta condición coincida con la respuesta del servidor
                                            // Si el servidor responde exitosamente, eliminar el elemento del archivo
                                            myDropzone.removeFile(file);
                                            console.log('Archivo eliminado:', data); // Log exitoso
                                        } else {
                                            // Si el servidor devuelve success: false o no incluye el campo success
                                            alert('No se pudo eliminar el archivo');
                                            console.log('Error al eliminar:', data); // Log de errores
                                        }
                                    })
                                    .catch(error => console.error('Error:', error));
                            });

                            // Añadir el botón de eliminar al elemento del archivo
                            file.previewElement.appendChild(removeButton);
                        });

                        myDropzone.on('error', function(file, response) {

                            console.log('Error al subir el archivo');

                            console.log(response); // Log de la respuesta para más detalles
                        });
                    }
                };
            </script>