<x-layout>
    <x-tabnav>
        <x-slot:DNI>{{ $usuario->DNI }}</x-slot:DNI>
        <x-slot:Nombres>{{ $usuario->nombres }}</x-slot:Nombres>
        <x-slot:Ap_Paterno>{{ $usuario->Apellido_Paterno }}</x-slot:Ap_Paterno>
        <x-slot:Ap_Materno>{{ $usuario->Apellido_Materno }}</x-slot:Ap_Materno>
        <x-slot:usuarioID>{{ $usuario->id }}</x-slot:usuarioID>
        <x-slot:message>No hay archivo subido</x-slot:message>
        <x-slot:certaccion>{{ route('certificados.store', ['id' => $usuario->id]) }}</x-slot:certaccion>

        @if(is_null($perfil))
            <x-slot:prop></x-slot:prop>
            <x-slot:prop1></x-slot:prop1>
            <x-slot:prop2></x-slot:prop2>
            <x-slot:tipo_date>date</x-slot:tipo_date>
            <x-slot:require>required</x-slot:require>
            <x-slot:fecha></x-slot:fecha>
            <x-slot:nacionalidad></x-slot:nacionalidad>
            <x-slot:metod>post</x-slot:metod>
            <x-slot:hidden1></x-slot:hidden1>
            <x-slot:hidden2>hidden</x-slot:hidden2>
            <x-slot:action1>{{ route('perfil.store', ['id' => $usuario->id]) }}</x-slot:action1>
        @else
            <x-slot:function>
                <script>
                    document.getElementById('updateBtn').addEventListener('click', function() {
                        document.getElementById('fecha_nacimiento').disabled = false;
                        document.getElementById('nacionalidad').disabled = false;
                        document.getElementById('telefono').disabled = false;
                        document.getElementById('correo').disabled = false;
                        document.querySelectorAll('input[name="genero"]').forEach(function(input) {
                            input.disabled = false;
                        });
                        document.getElementById('updateBtn').classList.add('hidden');
                        document.getElementById('submitBtn').classList.remove('hidden');
                    });
                </script>
            </x-slot:function>
            <x-slot:patch>@method('PATCH')</x-slot:patch>
            <x-slot:action1>{{ route('perfil.update', ['id' => $usuario->id]) }}</x-slot:action1>
            <x-slot:metod>patch</x-slot:metod>
            <x-slot:fecha>{{ $perfil->fecha_nacimiento }}</x-slot:fecha>
            <x-slot:hidden1>hidden</x-slot:hidden1>
            <x-slot:hidden2></x-slot:hidden2>
            <x-slot:nacionalidad>{{ $perfil->nacional }}</x-slot:nacionalidad>
            <x-slot:telefono>{{$perfil->telefono}}</x-slot:telefono>
            <x-slot:correo>{{$perfil->correo}}</x-slot:correo>
            <x-slot:require></x-slot:require>
            <x-slot:prop>disabled</x-slot:prop>
            <x-slot:tipo_date>text</x-slot:tipo_date>
            @if($perfil->genero == 'Masculino')
                <x-slot:prop1>checked="checked"</x-slot:prop1>
                <x-slot:prop2></x-slot:prop2>
            @else
                <x-slot:prop1></x-slot:prop1>
                <x-slot:prop2>checked="checked"</x-slot:prop2>
            @endif
        @endif

        @if(is_null($datos_academicos))
            <x-slot:propacad></x-slot:propacad>
            <x-slot:actionacad>{{ route('datos_academicos.store', ['id' => $usuario->id]) }}</x-slot:actionacad>
            <x-slot:Bachiller></x-slot:Bachiller>
            <x-slot:aegre></x-slot:aegre>
            <x-slot:titulo></x-slot:titulo>
            <x-slot:maestria></x-slot:maestria>
            <x-slot:doctorado></x-slot:doctorado>
            <x-slot:hidden1acad></x-slot:hidden1acad>
            <x-slot:hidden2acad>hidden</x-slot:hidden2acad>
            <x-slot:requireacad>required</x-slot:requireacad>
            <x-slot:tipo_dateacad>date</x-slot:tipo_dateacad>
        @else
            <x-slot:propacad>disabled</x-slot:propacad>
            <x-slot:actionacad>{{ route('Actdatos_academicos.update', ['id' => $usuario->id]) }}</x-slot:actionacad>
            <x-slot:Bachiller>{{ $datos_academicos->bachiller_academico }}</x-slot:Bachiller>
            <x-slot:aegre>{{ $datos_academicos->año_egreso }}</x-slot:aegre>
            <x-slot:titulo>{{ $datos_academicos->titulo_academico }}</x-slot:titulo>
            <x-slot:maestria>{{ $datos_academicos->maestria }}</x-slot:maestria>
            <x-slot:doctorado>{{ $datos_academicos->doctorado }}</x-slot:doctorado>
            <x-slot:hidden1acad>hidden</x-slot:hidden1acad>
            <x-slot:hidden2acad></x-slot:hidden2acad>
            <x-slot:functionacad>
                <script>
                    document.getElementById('updateBtnacad').addEventListener('click', function() {
                        document.getElementById('año_egreso').disabled = false;
                        document.getElementById('bachiller_academico').disabled = false;
                        document.getElementById('titulo_academico').disabled = false;
                        document.getElementById('maestria').disabled = false;
                        document.getElementById('doctorado').disabled = false;
                        document.getElementById('updateBtnacad').classList.add('hidden');
                        document.getElementById('submitBtnacad').classList.remove('hidden');
                    });
                </script>
            </x-slot:functionacad>
            <x-slot:patchacad>@method('PATCH')</x-slot:patchacad>
            <x-slot:requireacad></x-slot:requireacad>
            <x-slot:tipo_dateacad></x-slot:tipo_dateacad>
        @endif

        @if(is_null($curriculums))
            <x-slot:actiondrop>{{ route('curriculums.upload', ['id' => $usuario->id]) }}</x-slot:actiondrop>
            <x-slot:propcurri></x-slot:propcurri>
            <x-slot:curriculum></x-slot:curriculum>
            <x-slot:hidden1curri></x-slot:hidden1curri>
        @else
            <x-slot:actiondrop>{{ route('actcurriculums.upload', ['id' => $usuario->id]) }}</x-slot:actiondrop>
            <x-slot:patchcurr>@method('PATCH')</x-slot:patchcurr>
            @if($curriculums->path == null)
                <x-slot:curriculum></x-slot:curriculum>
                <x-slot:hidden1curri></x-slot:hidden1curri>
            @else
                <x-slot:curriculum></x-slot:curriculum>
                <x-slot:hidden1curri>hidden</x-slot:hidden1curri>
                <x-slot:message>
                    <iframe src="{{ asset('storage/' . $curriculums->path) }}" width="100%" height="500px"></iframe>
                </x-slot:message>
            @endif
        @endif

        @if(is_null($datos_profesionales) )
            <x-slot:actionprofesional>{{ route('datos_profesionales.store', ['id' => $usuario->id]) }}</x-slot:actionprofesional>
            <x-slot:prop1prof></x-slot:prop1prof>
            <x-slot:prop2prof></x-slot:prop2prof>
            <x-slot:prop3prof></x-slot:prop3prof>
            <x-slot:disableprof></x-slot:disableprof>
            <x-slot:empresa></x-slot:empresa>
            <x-slot:puesto></x-slot:puesto>
            <x-slot:sector></x-slot:sector>
            <x-slot:link></x-slot:link>
            <x-slot:hidden1prof></x-slot:hidden1prof>
            <x-slot:hidden2prof>hidden</x-slot:hidden2prof>
            <x-slot:requireprof>required</x-slot:requireprof>
            <x-slot:hiddenmodal>hidden</x-slot:hiddenmodal>
            <x-slot:curriculum>
                <script>
                    function submitForms() {
                        // Check if required inputs are filled
                        if (document.getElementById('empresa_actual').value == '' ||
                            document.getElementById('puesto_actual').value == '' ||
                            document.getElementById('sector_empresa_actual').value == '' ||
                            document.getElementById('redes_sociales').value == '') {
                            return false;
                        }

                        // If all conditions are met, submit the main form
                        document.getElementById('mainForm').submit();
                        return true;
                    }
                </script>
            </x-slot:curriculum>
        @else

            @if(is_null($curriculums))
                <x-slot:actiondrop>{{ route('curriculums.upload', ['id' => $usuario->id]) }}</x-slot:actiondrop>
                <x-slot:propcurri></x-slot:propcurri>
                <x-slot:curriculum></x-slot:curriculum>
                <x-slot:hidden1curri></x-slot:hidden1curri>
                <x-slot:patchcurr>@method('post')</x-slot:patchcurr>
                <x-slot:hidden1prof></x-slot:hidden1prof>
                <x-slot:hidden2prof>hidden</x-slot:hidden2prof>

            @else
                <x-slot:actiondrop>{{ route('actcurriculums.upload', ['id' => $usuario->id]) }}</x-slot:actiondrop>
                <x-slot:patchcurr>@method('PATCH')</x-slot:patchcurr>
                @if($curriculums->path == null)
                    <x-slot:curriculum></x-slot:curriculum>
                    <x-slot:hidden1curri></x-slot:hidden1curri>
                    <x-slot:actionprofesional>{{ route('datos_profesionales.update', ['id' => $usuario->id]) }}</x-slot:actionprofesional>
                    <x-slot:disableprof></x-slot:disableprof>
                    <x-slot:empresa>{{ $datos_profesionales->empresa_actual }}</x-slot:empresa>
                    <x-slot:puesto>{{ $datos_profesionales->puesto_actual }}</x-slot:puesto>
                    <x-slot:sector>{{ $datos_profesionales->sector_empresa_actual }}</x-slot:sector>
                    <x-slot:link>{{ $datos_profesionales->redes_sociales }}</x-slot:link>
                    <x-slot:hidden1prof></x-slot:hidden1prof>
                    <x-slot:hidden2prof>hidden</x-slot:hidden2prof>
                    <x-slot:curriculum>
                        <script>
                            function submitForms() {
                                // Verificar si hay un archivo seleccionado
                                if (Dropzone.instances[0].files.length === 0) {
                                    alert('Por favor, sube un archivo antes de enviar el formulario.');
                                    return false;
                                }

                                // Trigger the main form submission
                                document.getElementById('mainForm').submit();
                            }
                        </script>
                    </x-slot:curriculum>
                    
                @else
                    <x-slot:hidden1prof>hidden</x-slot:hidden1prof>
                    <x-slot:hidden2prof></x-slot:hidden2prof>
                    <x-slot:curriculum>
                        <script>
                            function submitForms() {
                                // Trigger the main form submission
                                document.getElementById('mainForm').submit();
                            }
                        </script>
                    </x-slot:curriculum>
                    <x-slot:curriculum></x-slot:curriculum>
                    <x-slot:hidden1curri>hidden</x-slot:hidden1curri>
                    <x-slot:message>
                        <iframe src="{{ asset('storage/' . $curriculums->path) }}" width="100%" height="500px"></iframe>
                    </x-slot:message>
                @endif
            @endif
            <x-slot:actionprofesional>{{ route('datos_profesionales.update', ['id' => $usuario->id]) }}</x-slot:actionprofesional>
            <x-slot:disableprof>disabled</x-slot:disableprof>
            <x-slot:empresa>{{ $datos_profesionales->empresa_actual }}</x-slot:empresa>
            <x-slot:puesto>{{ $datos_profesionales->puesto_actual }}</x-slot:puesto>
            <x-slot:sector>{{ $datos_profesionales->sector_empresa_actual }}</x-slot:sector>
            <x-slot:link>{{ $datos_profesionales->redes_sociales }}</x-slot:link>
            <x-slot:functionprof>
                <script>
                    document.getElementById('updateBtnprof').addEventListener('click', function() {
                        document.querySelectorAll('input[name="situacion_laboral"]').forEach(function(input) {
                            input.disabled = false;
                        });
                        document.getElementById('empresa_actual').disabled = false;
                        document.getElementById('puesto_actual').disabled = false;
                        document.getElementById('sector_empresa_actual').disabled = false;
                        document.getElementById('redes_sociales').disabled = false;
                        document.getElementById('curriculumdiv').classList.remove('hidden');
                        document.getElementById('updateBtnprof').classList.add('hidden');
                        document.getElementById('submitBtnprof').classList.remove('hidden');
                    });
                </script>
            </x-slot:functionprof>
            <x-slot:patchprof>@method('PATCH')</x-slot:patchprof>
            @if($datos_profesionales->situacion_laboral == 'Empleado')
                <x-slot:prop1prof>checked="checked"</x-slot:prop1prof>
                <x-slot:prop2prof></x-slot:prop2prof>
                <x-slot:prop3prof></x-slot:prop3prof>
            @elseif($datos_profesionales->situacion_laboral == 'Desempleado')
                <x-slot:prop1prof></x-slot:prop1prof>
                <x-slot:prop2prof>checked="checked"</x-slot:prop2prof>
                <x-slot:prop3prof></x-slot:prop3prof>
            @elseif($datos_profesionales->situacion_laboral == 'Freelance')
                <x-slot:prop1prof></x-slot:prop1prof>
                <x-slot:prop2prof></x-slot:prop2prof>
                <x-slot:prop3prof>checked="checked"</x-slot:prop3prof>
            @endif
        @endif

        <x-slot:certificadocar>
            @if($certificados->isEmpty())
                <p>No hay certificados</p>
            @else
                @foreach ($certificados as $certificado)
                    <x-cardCert>
                        <x-slot:nombrecer>{{ $certificado->nombre }}</x-slot:nombrecer>
                        <x-slot:descripcioncer>{{ $certificado->descripcion }}</x-slot:descripcioncer>
                        <x-slot:routeCert>{{ route('certificados.delete', ['id' => $usuario->id, 'certificado_id' => $certificado->id]) }}</x-slot:routeCert>
                    </x-cardCert>
                @endforeach
            @endif
        </x-slot:certificadocar>
    </x-tabnav>
</x-layout>
