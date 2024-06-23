<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <main class="grid grid-cols-2">
        <div class="flex justify-center items-center h-screen bg-blue-900">
            <div class="flex flex-col items-center justify-center mx-16">
                <img src="/logoUNT.png" alt="Logo" width={400} height={400} />
                <h1 class='font-serif text-4xl text-center text-white'>UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
            </div>
        </div>
        <div class="flex justify-center items-center h-screen bg-slate-200">
            <div class="flex flex-col items-center justify-center">
                <div class='Titule flex flex-col items-center justify-center mb-5 font-serif'>
                    <p class='text-2xl '>Bienvenido Ex-Alumnos</p>
                    <div class='subtitule'>
                        Ingrese sus datos para acceder a la plataforma
                    </div>
                </div>
                <div class='username'>
                    <label htmlFor="username" class="block text-sm font-medium leading-6 text-gray-900">
                        Username
                    </label>
                    <div class="mt-2">
                        <div class="flex  rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="username" id="username" autoComplete="username" class="block flex-1 w-96  border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 max-md:w-48 sm:text-sm sm:leading-6" placeholder="janesmith" />
                        </div>
                    </div>
                </div>
                <div class='contraseña mt-8'>
                    <label htmlFor="password" class="block text-sm font-medium leading-6 text-gray-900">
                        Contraseña
                    </label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="password" name="password" id="password" autoComplete="password" class="block flex-1 w-96 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 max-md:w-48 sm:text-sm sm:leading-6" placeholder="********" />
                        </div>
                    </div>
                </div>
                <div class='buttons mt-8 flex gap-4'>
                    <Button as={Link} href='/' class='bg-blue-700 text-white'>Ingresar</Button>
                    <Button as={Link} href='/registro' class='bg-yellow-600 text-white'>Registrarme</Button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>