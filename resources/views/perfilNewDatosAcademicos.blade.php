<x-layout>
    <div role="tablist" class="tabs tabs-bordered">
        <a role="tab" class="tab text-gray-500" href="/perfilNew/DatosPersonales" >
            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24" >
                <path d="M10.942 11.5942C12.4795 11.5942 13.954 10.9834 15.0412 9.89627C16.1284 8.8091 16.7391 7.33459 16.7391 5.7971C16.7391 4.25961 16.1284 2.7851 15.0412 1.69793C13.954 0.610764 12.4795 0 10.942 0C9.40456 0 7.93004 0.610764 6.84288 1.69793C5.75571 2.7851 5.14495 4.25961 5.14495 5.7971C5.14495 7.33459 5.75571 8.8091 6.84288 9.89627C7.93004 10.9834 9.40456 11.5942 10.942 11.5942ZM8.8723 13.7681C4.41125 13.7681 0.797119 17.3822 0.797119 21.8433C0.797119 22.586 1.39947 23.1884 2.14223 23.1884H19.7419C20.4846 23.1884 21.087 22.586 21.087 21.8433C21.087 17.3822 17.4728 13.7681 13.0118 13.7681H8.8723Z" fill="currentColor"/>
            </svg>
            <p class="text-lg font-semibold">
                Datos Personales
            </p>
        </a>

        <a role="tab" class="tab tab-active text-primary-light" href="/perfilNew/DatosAcademicos">
            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 20 23" fill="none">
                <path d="M9.96988 0.0215938C10.1035 -0.00426825 10.2414 -0.00426825 10.3751 0.0215938L18.9957 1.74573C19.4785 1.84056 19.8276 2.26728 19.8276 2.75866C19.8276 3.25004 19.4785 3.67677 18.9957 3.77159L15.6897 4.43539V6.89659C15.6897 9.94401 13.2199 12.4138 10.1725 12.4138C7.12506 12.4138 4.65523 9.94401 4.65523 6.89659V4.43539L2.58626 4.02159V6.82763L3.26299 10.2069C3.30178 10.4095 3.25006 10.6207 3.12075 10.7802C2.99144 10.9397 2.79316 11.0345 2.58626 11.0345H1.20695C1.00006 11.0345 0.806093 10.944 0.672472 10.7802C0.538851 10.6164 0.487127 10.4095 0.530231 10.2069L1.20695 6.82763V3.7328C0.797472 3.59056 0.5173 3.20263 0.5173 2.75866C0.5173 2.26728 0.866438 1.84056 1.3492 1.74573L9.96988 0.0215938ZM5.34058 14.125C5.79316 13.9785 6.28023 14.1423 6.60782 14.4914L9.66816 17.7457C9.93971 18.0345 10.4009 18.0345 10.6725 17.7457L13.7328 14.4914C14.0604 14.1423 14.5475 13.9785 15.0001 14.125C17.8018 15.0259 19.8276 17.6466 19.8276 20.7457C19.8276 21.4785 19.2328 22.069 18.5044 22.069H1.84058C1.11213 22.069 0.5173 21.4742 0.5173 20.7457C0.5173 17.6466 2.54316 15.0259 5.34058 14.125Z" fill="currentColor"/>
            </svg>
            <p class="text-lg font-semibold">
                Datos Académicos
            </p>
        </a>
        <div role="tabpanel" class="tab-content pt-10 mx-52">
            <form class="space-y-6" method="POST" id="dniForm">
                <div class="grid">
                    <label for="sede" class="block text-lg font-medium leading-6 text-gray-900">Sede de la Universidad Nacional de Trujillo</label>
                    <div class="relative mt-2">
                        <select id="sede" name="sede" required class="bg-white block w-full pl-3 pr-10 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Selecciona una sede</option>
                            <option value="valle_jequetepeque">Valle Jequetepeque</option>
                            <option value="moche">Moche</option>
                            <option value="trujillo">Trujillo</option>
                        </select>
                    </div>
                </div>

                <div class="grid">
                    <label for="anioIngreso" class="block text-lg font-medium leading-6 text-gray-900">Año de Ingreso a la Universidad</label>
                    <div class="relative mt-2">
                        <input id="anioIngreso" name="anioIngreso" type="number" required min="1900" max="2100" class="bg-white block w-full pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="grid">
                    <label for="anioEgreso" class="block text-lg font-medium leading-6 text-gray-900">Año de Egreso de la Universidad</label>
                    <div class="relative mt-2">
                        <input id="anioEgreso" name="anioEgreso" type="number" required min="1900" max="2100" class="bg-white block w-full pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="grid">
                    <label for="titulo" class="block text-lg font-medium leading-6 text-gray-900">Título Académico</label>
                    <div class="relative mt-2">
                        <select id="titulo" name="titulo" required class="bg-white block w-full pl-3 pr-10 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Selecciona un título</option>
                            <option value="bachiller_informatica">Bachiller en Informática</option>
                            <option value="licenciado_informatica">Licenciado en Informática</option>
                            <option value="ingeniero_informatica">Ingeniero en Informática</option>
                        </select>
                    </div>
                </div>

                <div class="grid">
                    <label for="maestria" class="block text-lg font-medium leading-6 text-gray-900">Maestría</label>
                    <div class="relative mt-2">
                        <select id="maestria" name="maestria" class="bg-white block w-full pl-3 pr-10 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Selecciona una maestría (opcional)</option>
                            <option value="no_maestria">No tiene maestría</option>
                            <option value="maestria_1">Maestría en Ciencias de la Computación</option>
                            <option value="maestria_2">Maestría en Tecnología de la Información</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                </div>

                <div class="grid">
                    <label for="doctorado" class="block text-lg font-medium leading-6 text-gray-900">Doctorado</label>
                    <div class="relative mt-2">
                        <select id="doctorado" name="doctorado" class="bg-white block w-full pl-3 pr-10 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="" disabled selected>Selecciona un doctorado (opcional)</option>
                            <option value="no_doctorado">No tiene doctorado</option>
                            <option value="doctorado_1">Doctorado en Ciencias de la Computación</option>
                            <option value="doctorado_2">Doctorado en Tecnología de la Información</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                </div>

                <div class="flex justify-center px-40 pt-7">
                    <button id="submitBtn" type="submit" class="flex w-full justify-center items-center rounded-md bg-yellowUNT px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blueUNT-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar</button>
                </div>

            </form>
        
        </div>
        
        <a role="tab" class="tab text-gray-500" href="/perfilNew/DatosProfesionales" >
            <svg class="pr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 19 21" fill="none">
                <path d="M2.12272 3.56122C1.02274 3.56122 0.128418 4.45554 0.128418 5.55552V15.527C0.128418 16.627 1.02274 17.5213 2.12272 17.5213H16.0828C17.1828 17.5213 18.0771 16.627 18.0771 15.527V5.55552C18.0771 4.45554 17.1828 3.56122 16.0828 3.56122H2.12272ZM4.6156 11.5384H6.6099C7.98721 11.5384 9.10278 12.654 9.10278 14.0313C9.10278 14.3055 8.87842 14.5299 8.6042 14.5299H2.6213C2.34708 14.5299 2.12272 14.3055 2.12272 14.0313C2.12272 12.654 3.23828 11.5384 4.6156 11.5384ZM3.61845 8.54697C3.61845 8.01805 3.82856 7.51079 4.20256 7.13679C4.57657 6.76278 5.08383 6.55267 5.61275 6.55267C6.14167 6.55267 6.64893 6.76278 7.02293 7.13679C7.39694 7.51079 7.60705 8.01805 7.60705 8.54697C7.60705 9.0759 7.39694 9.58315 7.02293 9.95716C6.64893 10.3312 6.14167 10.5413 5.61275 10.5413C5.08383 10.5413 4.57657 10.3312 4.20256 9.95716C3.82856 9.58315 3.61845 9.0759 3.61845 8.54697ZM11.5957 7.54982H15.5843C15.8585 7.54982 16.0828 7.77418 16.0828 8.0484C16.0828 8.32261 15.8585 8.54697 15.5843 8.54697H11.5957C11.3214 8.54697 11.0971 8.32261 11.0971 8.0484C11.0971 7.77418 11.3214 7.54982 11.5957 7.54982ZM11.5957 9.54412H15.5843C15.8585 9.54412 16.0828 9.76848 16.0828 10.0427C16.0828 10.3169 15.8585 10.5413 15.5843 10.5413H11.5957C11.3214 10.5413 11.0971 10.3169 11.0971 10.0427C11.0971 9.76848 11.3214 9.54412 11.5957 9.54412ZM11.5957 11.5384H15.5843C15.8585 11.5384 16.0828 11.7628 16.0828 12.037C16.0828 12.3112 15.8585 12.5356 15.5843 12.5356H11.5957C11.3214 12.5356 11.0971 12.3112 11.0971 12.037C11.0971 11.7628 11.3214 11.5384 11.5957 11.5384Z" fill="currentColor"/>
            </svg>
            <p class="text-lg font-semibold">
                Datos Profesionales
            </p>
        </a>
        <div role="tabpanel" class="tab-content p-10">Tab content 3</div>
    </div>

    
</x-layout>
