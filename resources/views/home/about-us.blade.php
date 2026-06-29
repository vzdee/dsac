<x-home-layout titleWindow="Nosotros">
    <section id="nosotros" class="relative grid min-h-screen grid-cols-1 overflow-hidden bg-[#1F1F1F] pt-16 lg:grid-cols-[55%_45%]">
        
        <div class="relative min-h-80 overflow-hidden border-b border-white/10 lg:min-h-0 lg:border-b-0 lg:border-r">
            <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                alt="Equipo DSAC" class="h-full w-full bg-white object-cover object-top grayscale">
        </div>
        <div class="flex flex-col justify-center px-6 py-20 sm:px-8 md:px-16">
            <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                <span class="block h-px w-5 bg-[#B0393F]"></span>
                Nuestra historia
            </p>

            <h2 class="font-display mb-8 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-white md:text-6xl">
                Confianza cimentada<br>
                en <em class="not-italic text-[#B0393F]">la experiencia.</em>
            </h2>

            <div class="mb-10 flex max-w-2xl flex-col gap-4">
                <p class="text-base leading-8 text-white/60">
                    Fundada en el año 2012, <strong class="font-semibold text-white">DSAC</strong> se ha consolidado
                    como el aliado estratégico de personas físicas y morales en Mérida. Sin importar si es tu
                    primera declaración o llevas años con un negocio en crecimiento, resolvemos lo que necesites
                    frente al SAT, el IMSS y Hacienda — sin que tengas que ir armando el rompecabezas con
                    distintos proveedores.
                </p>

                <p class="text-base leading-8 text-white/60">
                    Como tus <strong class="font-semibold text-white">aliados estratégicos</strong>, garantizamos
                    un servicio de la más alta calidad mediante atención <strong class="font-semibold text-white">directa
                    y 100% personalizada</strong>. Nos anticipamos a los retos regulatorios para que tu única
                    tarea sea decidir, no perseguir papeleo.
                </p>
            </div>

            <div class="border-t border-white/10 pt-6">
                <blockquote class="font-display mb-8 border-l-4 border-[#B0393F] pl-5 text-xl italic leading-8 text-white/90">
                    “Más allá de los números — construimos relaciones a largo plazo mediante un trato directo,
                    ético y transparente.”
                </blockquote>
                <p class="text-base font-semibold text-white">Dirección DSAC</p>
                <p class="text-sm text-white/50">Socios Fundadores</p>
            </div>
        </div>
    </section>

    <section class="bg-white px-6 py-24 md:px-14">
        <div class="mx-auto max-w-6xl">

            <div class="mb-14 grid grid-cols-1 items-end gap-8 lg:grid-cols-2">
                <div>
                    <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                        <span class="block h-px w-5 bg-[#B0393F]"></span>
                        Conoce nuestro despacho
                    </p>
                    <h2 class="font-display mb-8 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                        Nuestro equipo <br>
                        <em class="not-italic text-[#B0393F]">de expertos</em>
                    </h2>
                    <p class="mt-4 text-base leading-7 text-[#6B6568]">
                        Conoce al equipo que está detrás de cada solución. Nuestros especialistas combinan experiencia, compromiso y atención personalizada para acompañarte en cada etapa de tus obligaciones fiscales, contables y administrativas.
                    </p>
                </div>
            </div>

            @php
                // NOTA: perfiles de ejemplo — sustituir por fotos y cédulas profesionales reales del equipo.
                $team = [
                    [
                        'name' => 'C.P. Daniel Castro',
                        'role' => 'Director y socio fundador',
                        'focus' => 'Planeación fiscal y empresas familiares',
                        'cedula' => 'Cédula Prof. 4 821 003',
                    ],
                    [
                        'name' => 'C.P. Daniela Castro',
                        'role' => 'Gerente de cumplimiento SAT',
                        'focus' => 'Declaraciones e inspecciones',
                        'cedula' => 'Cédula Prof. 5 117 642',
                    ],
                    [
                        'name' => 'Lic. Mari Ek',
                        'role' => 'Colaborador',
                        'focus' => 'Nómina y régimen patronal',
                        'cedula' => 'Cédula Prof. 6 203 918',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                @foreach ($team as $member)
                    <div class="group flex flex-col items-start gap-5 rounded-2xl border border-[#E4DFDC] bg-[#F9F6F3] p-8 transition hover:border-[#B0393F]/40 hover:shadow-lg hover:shadow-black/5">

                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#1F1F1F] text-lg font-semibold text-white">
                            {{ collect(explode(' ', preg_replace('/^(C\.P\.|Lic\.)\s*/', '', $member['name'])))->map(fn($n) => mb_substr($n, 0, 1))->take(2)->join('') }}
                        </div>

                        <div>
                            <h3 class="text-base font-semibold text-[#1F1F1F]">{{ $member['name'] }}</h3>
                            <p class="text-sm text-[#B0393F]">{{ $member['role'] }}</p>
                        </div>

                        <p class="text-sm leading-6 text-[#6B6568]">
                            {{ $member['focus'] }}
                        </p>

                        <p class="mt-auto flex items-center gap-2 border-t border-[#E4DFDC] pt-4 text-xs text-[#6B6568]">
                            <i class="fa-solid fa-id-card text-[#5C6B4F]"></i>
                            {{ $member['cedula'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-home-layout>