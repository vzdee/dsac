<x-home-layout titleWindow="Nuestros Servicios">
    <section class="bg-[#F9F6F3] py-20 lg:py-28 relative overflow-hidden min-h-screen">
        <div class="pointer-events-none absolute -left-40 top-20 h-[420px] w-[420px] rounded-full bg-[#B0393F]/[0.05] blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 right-1/4 h-[320px] w-[320px] rounded-full bg-[#1F1F1F]/[0.035] blur-3xl"></div>
        
        <div class="mx-auto max-w-7xl text-left px-6 md:px-14 relative z-10">
            <div class="mb-16 text-left reveal">
                <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Nuestra Oferta
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                </p>
                <h1 class="font-display text-4xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-5xl lg:text-6xl">
                    Servicios <em class="not-italic text-[#B0393F]">Especializados</em>
                </h1>
                <p class=" mt-6 max-w-2xl text-base leading-8 text-[#6B6568]">
                    Conoce nuestro catálogo de servicios contables y fiscales diseñados para darte la tranquilidad y seguridad que necesitas para hacer crecer tu patrimonio y tu empresa.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($services as $index => $service)
                    <div class="reveal group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5" style="animation-delay: {{ $index * 100 }}ms;">
                        <div class="mb-6">
                            <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-xl bg-[#F9F6F3] text-2xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            
                            <h3 class="mb-3 text-2xl font-semibold text-[#1F1F1F]">{{ $service->name }}</h3>
                            <p class="text-sm leading-relaxed text-[#6B6568]">
                                {{ $service->description }}
                            </p>
                        </div>
                        
                        <div class="mt-auto border-t border-[#E4DFDC] pt-6">
                            <div class="mb-6 flex items-baseline gap-2">
                                <span class="text-3xl font-bold text-[#1F1F1F]">${{ number_format($service->price) }}</span>
                                <span class="text-sm font-medium text-[#6B6568]">MXN</span>
                            </div>
                            <a href="https://wa.me/529991398765?text={{ urlencode('Hola, me interesa el servicio de '.$service->name.'. ¿Podrían darme más información?') }}" target="_blank" rel="noopener noreferrer" class="flex w-full items-center justify-center gap-2 rounded-lg bg-[#F9F6F3] px-5 py-3 text-sm font-semibold text-[#1F1F1F] transition hover:bg-[#B0393F] hover:text-white">
                                Solicitar Servicio
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center rounded-2xl border border-[#E4DFDC] bg-white py-20 text-center shadow-sm">
                        <span class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-[#F9F6F3] text-2xl text-[#6B6568]">
                            <i class="fa-solid fa-folder-open"></i>
                        </span>
                        <h3 class="mb-2 text-xl font-semibold text-[#1F1F1F]">No hay servicios disponibles</h3>
                        <p class="text-sm text-[#6B6568]">Por el momento no contamos con servicios registrados.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-16 text-center">
                <p class="mb-6 text-sm text-[#6B6568]">¿No encuentras lo que buscas o necesitas una asesoría personalizada?</p>
                <a href="https://wa.me/529991398765?text={{ urlencode('Hola, me gustaría recibir una cotización personalizada. ¿Podrían ayudarme?') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-lg border border-[#D8D2CF] bg-white px-6 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                    Cotizar a medida
                </a>
            </div>
        </div>
    </section>
</x-home-layout>