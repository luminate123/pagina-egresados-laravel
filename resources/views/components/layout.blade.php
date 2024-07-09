<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../path/to/src/pagedone.css" />
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="flex flex-col min-h-screen">
    <header class=" top-0 left-0 w-full">
        <nav class=" fixed navbar bg-blue-600 z-50">
            <div class="flex-1 justify-items-center">
                <a class="btn btn-ghost text-xl">
                    <img src="/logoUNT.png" class="w-15 h-10" />
                    Escuela de Ingenieria Informatica
                </a>
            </div>
            <div class="flex-none ">
                <p class="text-white">{{ Auth::user()->nombres }} {{ Auth::user()->Apellido_Materno }} {{ Auth::user()->Apellido_Paterno }}</p>
                <div class="avatar placeholder mr-10 ml-6">
                    <div class="bg-neutral text-neutral-content w-12 rounded-full">
                        <span>
                            {{ collect(explode(' ', Auth::user()->nombres))->map(function($name) { return $name[0]; })->implode('') }}
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main content wrapper -->
    <div class="flex flex-grow pt-16"> <!-- Add padding to avoid overlap with header -->
        <!-- Sidebar -->
        <div class="flex flex-col w-64 bg-white border-r fixed h-full">
            <div class="overflow-y-auto flex-grow">
                <ul class="flex flex-col justify-between py-4 pb-20 h-full">
                    <div>
                        <li class="px-5">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                            </div>
                        </li>
                        <li>
                            <a href="/dashboard" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 pr-6 {{ Request::is('dashboard') ? 'border-indigo-500' : 'border-transparent ' }}">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Inicio</span>
                            </a>
                        </li>

                        <li>
                            <a href="/empleos" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 pr-6 {{ Request::is('empleos') ? 'border-indigo-500' : 'border-transparent' }}">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Bolsa de Trabajo</span>
                            </a>
                        </li>
                    </div>

                    <div>
                        <li class="px-5">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                            </div>
                        </li>
                        @if (Auth::user()->role == 'admin')
                        <li>
                            <a href="/perfiles" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 pr-6 {{ Request::is('perfil') ? 'border-indigo-500' : 'border-transparent ' }}">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Perfiles</span>
                            </a>
                        </li>

                        @else
                        <li>

                            <a href="/perfil/{{Auth::user()->id }}  " class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 pr-6 {{ Request::is('perfil/*') ? 'border-indigo-500' : 'border-transparent ' }}">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Perfil</span>
                            </a>
                        </li>
                        </li>
                        </li>
                        @endif
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/" onclick="this.closest('form').submit()" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                                    <span class="inline-flex justify-center items-center ml-4">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                                </a>
                            </form>
                        </li>
                    </div>
                </ul>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex-grow pt-5 pl-4 ml-64 "> <!-- Add margin to avoid overlap with sidebar and header -->
            {{ $slot }}
        </div>
    </div>
</body>

</html>