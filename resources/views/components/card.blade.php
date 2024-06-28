<div class="card card-compact bg-base-100 w-64 shadow-xl m-6">
    <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" class="h-72" alt="Shoes" />

    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $titulo }}</h2>
        <p>{{ $descripcion }}</p>
        <p>{{ $fecha_publicacion }}</p>
        <div class="card-actions justify-end">
            <a href="{{ $link }}" target="_blank" class="btn btn-primary">Ver más</a>
        </div>
    </div>
</div>