<div class="card bg-white border-2 text-black-content max-w-96 mt-5">
    <div class="flex p-2 items-center justify-center">
        <div class="grid w-4/5">
            <h2 class="card-title">{{$nombrecer ?? '' }}</h2>
            <p>{{$descripcioncer ?? '' }}</p>
        </div>
        <div class="card-actions justify-end">
            <form action="{{$routeCert}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-error">Eliminar</button>
            </form>
        </div>
    </div>
</div>