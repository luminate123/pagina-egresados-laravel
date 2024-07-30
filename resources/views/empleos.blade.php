<x-layout>
    <h1 class="text-4xl font-bold mb-4">Empleos</h1>
    <div class="flex flex-col justify-start space-y-4 p-3">
        @if($empleos->isEmpty())
        <p>No hay empleos registrados</p>
        @else
        @foreach ($empleos as $empleo)
        <x-card>
            <x-slot:imagen>{{asset('storage/imagenes/' . $empleo->imagen)  }}</x-slot:imagen>
            <x-slot:titulo>{{$empleo->titulo}}</x-slot:titulo>
            <x-slot:descripcion>{{$empleo->descripcion}}</x-slot:descripcion>
            <x-slot:fecha_publicacion>{{ $empleo->created_at->format('d/m/Y') }}</x-slot:fecha_publicacion>
            <x-slot:link>{{$empleo->link}}</x-slot:link>
        </x-card>
        @endforeach
        @endif
    </div>

</x-layout>