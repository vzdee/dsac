<nav class="fixed top-0 start-0 z-50 w-full border-b border-gray-100 bg-white/95 shadow-sm backdrop-blur-md">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4 py-2.5">

        <x-application-logo />

        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-sm text-gray-700 transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="mt-4 flex flex-col rounded-xl border border-gray-100 bg-white p-4 font-medium shadow-sm md:mt-0 md:flex-row md:items-center md:space-x-8 md:border-0 md:bg-transparent md:p-0 md:shadow-none rtl:space-x-reverse">
                <li>
                    <a href="#" class="block rounded-lg bg-[#B0393F] px-3 py-2 text-white transition md:bg-transparent md:p-0 md:text-sm md:font-semibold md:text-[#B0393F] md:hover:text-[#8a2d33]"
                        aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="#" class="block rounded-lg px-3 py-2 text-gray-700 transition hover:bg-gray-50 hover:text-[#B0393F] md:p-0 md:text-sm md:hover:bg-transparent">
                        Servicio
                    </a>
                </li>
                <li>
                    <a href="#" class="block rounded-lg px-3 py-2 text-gray-700 transition hover:bg-gray-50 hover:text-[#B0393F] md:p-0 md:text-sm md:hover:bg-transparent">
                        Nosotros
                    </a>
                </li>
                <li>
                    <a href="#" class="block rounded-lg px-3 py-2 text-gray-700 transition hover:bg-gray-50 hover:text-[#B0393F] md:p-0 md:text-sm md:hover:bg-transparent">
                        Contacto
                    </a>
                </li>
                <li>
                    <a href="#" class="block rounded-lg px-3 py-2 text-gray-700 transition hover:bg-gray-50 hover:text-[#B0393F] md:p-0 md:text-sm md:hover:bg-transparent">
                        FAQ
                    </a>
                </li>
                <li class="mt-3 border-t border-gray-100 pt-4 md:hidden">
                    <a href="{{ route('request-service') }}" class="block rounded-lg bg-[#B0393F] px-4 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-[#8a2d33]">
                        Agendar cita
                    </a>
                </li>
                <li class="md:hidden mt-3">
                    <a href="{{ route('login') }}" class="block rounded-lg border border-gray-300 px-4 py-2.5 text-center text-sm font-semibold text-gray-700 transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                        Acceso empleados
                    </a>
                </li>
            </ul>
        </div>
        <div class="hidden md:flex md:items-center md:space-x-3 rtl:space-x-reverse">
            <a href="{{ route('request-service') }}" class="rounded-lg bg-[#B0393F] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#8a2d33]">
                Agendar Cita
            </a>
            <a href="{{ route('login') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                Acceso Empleados
            </a>
        </div>
    </div>
</nav>
