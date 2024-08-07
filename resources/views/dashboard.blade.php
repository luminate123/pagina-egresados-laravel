<x-layout>
    @if (Auth::user()->role == 'admin')
    <!-- Contenido solo para administradores -->
    <p class="text-4xl font-bold mb-4">Bienvenido administrador</p>
    <x-formEmpleo>
    </x-formEmpleo>
    @else
    Noticias
    <div class="card lg:card-side bg-base-100 shadow-xl h-36">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">New album is released!</h2>
            <p>Click the button to listen on Spotiwhy app.</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Listen</button>
            </div>
        </div>
    </div>

    @endif
</x-layout>