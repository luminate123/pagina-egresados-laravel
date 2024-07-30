<x-layout>
    <x-slot name="title">Perfiles</x-slot>
    <h1 class="text-4xl font-bold mb-4">Perfiles</h1>

    <div class="p-5">
        <form method="GET" action="{{ url('perfiles') }}" class="flex justify-center gap-4">
            <div>
                <input type="text" name="search_name" value="{{ $searchName }}" placeholder="Buscar por nombre" class="input input-bordered w-full max-w-xs" />
            </div>
            <div>
                <input type="text" name="search_apellido_paterno" value="{{ $searchApellidoPaterno }}" placeholder="Buscar por apellido paterno" class="input input-bordered w-full max-w-xs" />
            </div>
            <div>
                <input type="text" name="search_apellido_materno" value="{{ $searchApellidoMaterno }}" placeholder="Buscar por apellido materno" class="input input-bordered w-full max-w-xs" />
            </div>
            <div>
                <select name="search_año_egreso" class="select select-bordered w-full max-w-xs">
                    <option value="">Todos los años</option>
                    @foreach ($datos_academicos->pluck('año_egreso')->map(function($date) {
                    return date('Y', strtotime($date));
                    })->unique() as $año_egreso)
                    <option value="{{ $año_egreso }}" {{ $searchAñoEgreso == $año_egreso ? 'selected' : '' }}>
                        {{ $año_egreso }}
                    </option>
                    @endforeach
                </select>

            </div>
            <div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ url('perfiles') }}" class="btn btn-neutral">Restablecer</a>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto p-5">
        <table class="table">
            <thead>
                <tr class="border-gray-800">
                    <th>N°</th>
                    <th>Name</th>
                    <th>Apellidos</th>
                    <th>Año de egreso</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $key => $usuario)
                @if ($usuario->role === 'user')
                <tr class="border-gray-800 hover">
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $usuario->nombres }}</td>
                    <td>{{ $usuario->Apellido_Paterno }} {{ $usuario->Apellido_Materno }}</td>
                    @php $hasData = false; @endphp
                    @foreach($datos_academicos as $dato)
                    @if ($dato->id_usuario === $usuario->id)
                    <td>{{ date('Y', strtotime($dato->año_egreso)) }}</td>
                    @php $hasData = true; @endphp
                    @break
                    @endif
                    @endforeach
                    @if (!$hasData)
                    <td>Aun no llenado</td>
                    @endif
                    <td>
                        <a href="/Visualizarperfil/{{$usuario->id}}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>