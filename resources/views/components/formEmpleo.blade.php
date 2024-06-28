<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST" action="registroempleo" id="newsForm">
        @csrf
        <div class="grid">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
            <div class="mt-2">
                <input id="title" name="title" type="text" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="grid">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Descripción</label>
            <div class="mt-2">
                <textarea id="description" name="description" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <div class="grid">
            <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Link</label>
            <div class="mt-2">
                <input id="link" name="link" type="text" required class="bg-white block w-full pl-3 rounded-md border-0 py-1.5 text-sky-800 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
        </div>

        <div>
            <button id="submitBtn" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publicar Noticia</button>
        </div>
    </form>
</div>


