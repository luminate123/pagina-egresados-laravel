<x-layout>
    <h1>Empleos</h1>
    <div class="flex flex-wrap justify-start">
        @if($empleos->isEmpty())
        <p>No hay empleos registrados</p>
        @else
        @foreach ($empleos as $empleo)
        <x-card>
            <x-slot:titulo>{{$empleo->titulo}}</x-slot:titulo>
            <x-slot:descripcion>{{$empleo->descripcion}}</x-slot:descripcion>
            <x-slot:fecha_publicacion>{{ \Carbon\Carbon::parse($empleo->fecha_publicacion)->format('d/m/Y') }}</x-slot:fecha_publicacion>
            <x-slot:link>{{$empleo->link}}</x-slot:link>
        </x-card>
        @endforeach
        @endif
    </div>

</x-layout>