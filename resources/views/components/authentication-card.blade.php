<div class="min-h-screen bg-[#F7F4EF] flex items-center justify-center px-6 py-10">
    <div
        class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-[1fr_.9fr] bg-white border border-[#E4E0D8] shadow-[0_30px_90px_rgba(10,10,10,.08)] overflow-hidden">

        {{-- Panel izquierdo --}}
        <div class="hidden lg:flex flex-col justify-between p-12 bg-[#F7F4EF] border-r border-[#E4E0D8]">

            <div>
                <div class="flex items-center">
                    <x-authentication-card-logo />
                </div>

                <div class="mt-16">
                    <p class="flex items-center gap-3 mb-5 text-[.72rem] font-bold tracking-[.18em] uppercase text-[#B0393F]">
                        <span class="block w-8 h-px bg-[#B0393F]"></span>
                        Acceso seguro
                    </p>

                    <h1 class="leading-[.95] text-[clamp(2.8rem,4vw,4.5rem)] tracking-[-.03em] text-[#0A0A0A]">Bienvenido a<br><em class="text-[#B0393F]">DSAC</em></h1>
                    <p class="mt-7 max-w-md text-[1rem] leading-8 text-[#9A9690]">
                        Ingresa a tu panel para consultar citas, gestionar servicios y dar seguimiento a la información
                        fiscal correspondiente.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 pt-10">
                <div class="border border-[#E4E0D8] bg-white p-4">
                    <p class=" text-3xl text-[#B0393F]">01</p>
                    <p class="mt-2 text-[.72rem] uppercase tracking-[.12em] text-[#9A9690]">Citas</p>
                </div>

                <div class="border border-[#E4E0D8] bg-white p-4">
                    <p class="text-3xl text-[#B0393F]">02</p>
                    <p class="mt-2 text-[.72rem] uppercase tracking-[.12em] text-[#9A9690]">Servicios</p>
                </div>

                <div class="border border-[#E4E0D8] bg-white p-4">
                    <p class="text-3xl text-[#B0393F]">03</p>
                    <p class="mt-2 text-[.72rem] uppercase tracking-[.12em] text-[#9A9690]">Control</p>
                </div>
            </div>

        </div>

        {{-- Panel derecho: formulario --}}
        <div class="flex flex-col justify-center px-6 py-10 sm:px-10 md:px-14 lg:px-16">

            {{-- Logo móvil --}}
            <div class="mb-10 flex justify-center lg:hidden">
                <x-authentication-card-logo />
            </div>
            <div class="w-full max-w-md mx-auto">

                <div class="mb-8">
                    <p class="mb-4 text-[.72rem] font-bold uppercase tracking-[.18em] text-[#B0393F]">
                        {{ $title ?? '' }}</p>
                    <h2 class="text-[2.4rem] leading-none tracking-[-.03em] text-[#0A0A0A]">{{ $subtitle ?? '' }}</h2>
                    <p class="mt-4 text-[.95rem] leading-7 text-[#9A9690]">
                        {{ $description ?? '' }}</p>
                </div>

                <div class="w-full">
                    {{ $slot }}
                </div>

                <div class="mt-8 border-t border-[#E4E0D8] pt-6 text-center">
                    <a href="{{ route('home') }}" class="text-[.72rem] font-bold uppercase tracking-[.14em] text-[#B0393F] transition hover:text-[#8C2C31]">
                        ← Volver a la página principal
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
