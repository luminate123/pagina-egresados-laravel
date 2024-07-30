<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="card bg-white border-1 text-black-content max-w-96 mt-5 bg-zinc-300">
    <div class="flex p-2 items-center justify-center">
    <i class="fa-regular fa-file scale-150" ></i>    
    <div class="grid w-4/5">
            <h2 class="card-title pl-5 font-mono">{{$nombrecer ?? '' }}</h2>
            <p class="pl-5 font-mono	">{{$descripcioncer ?? '' }}</p>
        </div>
        <div class="card-actions justify-end ">
            <form action="{{$routeCert}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-error"><i class="fa-solid fa-trash scale-150"></i></button>
            </form>
        </div>
    </div>
</div>
