<x-layout>
    <x-slot name="title">Perfiles</x-slot>

    <div class="overflow-x-auto p-5">

        <div>
            <div class=" px-4 sm:px-0">
                <div class="avatar placeholder mb-1">
                    <div class="bg-neutral text-neutral-content w-24 rounded-full">
                        <span class="text-3xl">{{ collect(explode(' ', $usuario->nombres))->map(function($name) { return $name[0]; })->implode('') }}
                        </span>
                    </div>
                </div>
                <h3 class="text-base font-semibold leading-7 text-gray-900">{{$usuario->nombres}}</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Perfil</p>
            </div>
            <div class="mt-6 border-t border-gray-100">

                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nombres y Apellidos</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$usuario->nombres}} {{$usuario->Apellido_Paterno}} {{$usuario->Apellido_Materno}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">DNI</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$usuario->DNI}} </dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$perfil->fecha_nacimiento ?? 'No'}} </dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nacionalidad</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$perfil->nacional ?? 'No'}} </dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Genero</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$perfil->genero ?? 'No'}} </dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Telefono</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$perfil->telefono ?? 'No'}} </dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Correo</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$perfil->correo ?? 'No'}} </dd>

                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Año de Egreso</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_academicos->año_egreso ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Bachiller</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_academicos->bachiller_academico ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Titulo Profesional</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_academicos->titulo_academico ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Maestria</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_academicos->maestria ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Titulo Profesional</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_academicos->doctorado ?? 'No'}}</dd>

                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Situacion laboral</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_profesionales->situacion_laboral ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Empresa actual</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_profesionales->empresa_actual ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Puesto actual</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_profesionales->puesto_actual ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sector de la empresa</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_profesionales->sector_empresa_actual ?? 'No'}}</dd>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Linkdln</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$datos_profesionales->redes_sociales ?? 'No'}}</dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Curriculum</dt>
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">

                            @if(is_null($curriculums))
                                <p>No registro Curriculum</p>
                            @else
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">Curriculum_{{$usuario->nombres}}.pdf</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{asset('storage/' .$curriculums->path)}}" download="Curriculum_{{$usuario->nombres}}_{{$usuario->Apellido_Paterno}}{{$usuario->Apellido_Materno}}.pdf" class="font-medium text-indigo-600 hover:text-indigo-500">Descargar</a>
                                    </div>
                                </li>
                            </ul>
                            @endif

                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </div>
</x-layout>