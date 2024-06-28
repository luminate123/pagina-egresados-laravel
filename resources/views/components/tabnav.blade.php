<form action="">
    <div role="tablist" class="tabs tabs-lifted">

        <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Datos Personales" checked="checked" />
        <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 space-y-6 ">

            <div class="flex justify-center space-x-4">
                <div class="grid">
                    <label for="DNI" class="block text-sm font-medium leading-6 text-gray-900">DNI</label>
                    <div class="mt-2">
                        <input id="DNI" name="DNI" type="text" placeholder="{{$DNI}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="grid">
                    <label for="Nombres" class="block text-sm font-medium leading-6 text-gray-900">Nombres</label>
                    <div class="mt-2">
                        <input id="Nombres" name="Nombres" type="text" placeholder="{{$Nombres}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="grid">
                    <label for="Apellido Paterno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Paterno</label>
                    <div class="mt-2">
                        <input id="Apellido Paterno" name="Apellido Paterno" type="text" placeholder="{{$Ap_Paterno}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="grid">
                    <label for="Apellido Materno" class="block text-sm font-medium leading-6 text-gray-900">Apellido Materno</label>
                    <div class="mt-2">
                        <input id="Apellido Materno" name="Apellido Materno" type="text" placeholder="{{$Ap_Materno}}" disabled class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class=" grid justify-center p-6 space-y-4">
                <div class="flex space-x-4  ">
                    <div class="grid">
                        <label for="fecha_nacimiento" class="block text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</label>
                        <div class="mt-2">

                            <input id="fecha_nacimiento" name="fecha_nacimiento" type="{{$tipo_date}}" placeholder="{{$fecha}}" {{$prop}} class="bg-white block w-96 p-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="grid ">
                        <label for="Genero" class="block text-sm font-medium leading-6 text-gray-900">Genero</label>
                        <div class="flex pt-1">
                            <div class="form-control">
                                <label class="label cursor-pointer space-x-3">
                                    <span class="label-text">Masculino</span>
                                    <input type="radio" {{$prop}} name="radio-10" {{$require}} class="radio checked:bg-blue-500" {{$prop1}} />
                                </label>
                            </div>
                            <div class="form-control">
                                <label class="label cursor-pointer space-x-3">
                                    <span class="label-text">Femenino</span>
                                    <input type="radio" {{$prop}} name="radio-10" {{$require}} class="radio checked:bg-blue-500" {{$prop2}} />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid justify-items-start">
                    <label for="Nacionalidad" class="block text-sm font-medium leading-6 text-gray-900">Nacionalidad</label>
                    <div class="mt-2">
                        <input id="Nacionalidad" name="Nacionalidad" type="text" placeholder="{{$nacionalidad}}" {{$prop}} class="bg-white block w-86 pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

            </div>


        </div>

        <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Datos" />
        <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            Tab content 2
        </div>

        <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Tab 3" />
        <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            Tab content 3
        </div>


    </div>
</form>