<div class="card card-side h-auto w-full bg-base-100 border  ">
    <figure>
        <img src="{{ $imagen }}" class="h-52" alt="Shoes" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $titulo }}</h2>
        <p>{{ $descripcion }}</p>
        <p>{{ $fecha_publicacion }}</p>
        <div class="card-actions justify-end">
            <a href="{{ $imagen }}" download="requisitos" class="btn btn-primary">Descargar requisitos</a>
            <a href="{{ $link }}" target="_blank" class="btn btn-primary">Ver más</a>
        </div>
    </div>
</div>