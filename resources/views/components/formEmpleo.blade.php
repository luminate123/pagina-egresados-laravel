<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST" action="{{ route('empleos.store') }}" id="newsForm" enctype="multipart/form-data">
        @csrf
        <div class="grid">
            <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
            <div class="mt-2">
                <input id="titulo" name="titulo" type="text" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="grid">
            <label for="descripcion" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
            <div class="mt-2">
                <textarea id="descripcion" name="descripcion" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>

        <div class="grid">
            <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Link</label>
            <div class="mt-2">
                <input id="link" name="link" type="url" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="imagen" class="block text-sm font-medium leading-6 text-gray-900">Imagen</label>
            <div class="mt-2">
                <input id="imagen" name="imagen" type="file" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>
        </div>

        <div>
            <button id="submitBtn" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publicar empleo</button>
        </div>
    </form>
</div>