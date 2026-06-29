<x-home-layout titleWindow="Inicio">
    <section id="inicio" class="relative grid min-h-screen grid-cols-1 overflow-hidden bg-[#F9F6F3] pt-16 lg:grid-cols-[55%_45%]">
        <div class="pointer-events-none absolute -left-40 top-20 h-[420px] w-[420px] rounded-full bg-[#B0393F]/[0.05] blur-3xl">
        </div>
        <div class="pointer-events-none absolute bottom-0 left-1/3 h-[320px] w-[320px] rounded-full bg-[#1F1F1F]/[0.035] blur-3xl">
        </div>

        <div class="reveal-left relative z-10 flex flex-col justify-center px-6 py-20 sm:px-8 md:px-14 lg:px-16 lg:py-0">
            <h1 class="font-display mb-6 max-w-4xl text-5xl font-semibold leading-[.96] tracking-[-.045em] text-[#1F1F1F] md:text-6xl lg:text-7xl">
                Tu contabilidad,<br>
                <em class="not-italic text-[#B0393F]">en manos que sí conoces.</em>
            </h1>

            <p class="mb-8 max-w-xl border-l-2 border-[#B0393F] pl-5 text-base leading-8 text-[#6B6568] md:text-[1.02rem]">
                Despacho contable y fiscal en Mérida con más de 14 años de experiencia, acompañando a personas físicas,
                morales y empresas en crecimiento.
            </p>

            <ul class="mb-10 flex max-w-xl flex-col gap-3">
                @foreach (['Asesoramiento personalizado y directo.', 'Estrategias fiscales pensadas para ti o tu empresa.', 'Trámites claros para tu tranquilidad.'] as $item)
                    <li class="flex items-start gap-3 text-sm leading-7 text-[#1F1F1F] md:text-[.95rem]">
                        <span
                            class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#B0393F]/10 text-[10px] text-[#B0393F]">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('request-service') }}" class="inline-flex items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                    Agendar Cita
                </a>

                <a href="#servicios" class="inline-flex items-center justify-center rounded-lg border border-[#D8D2CF] bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                    Ver servicios →
                </a>
            </div>
        </div>

        <div class="reveal-right relative min-h-[520px] overflow-hidden border-t border-[#E4DFDC] lg:min-h-0 lg:border-l lg:border-t-0">
            <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                alt="Equipo DSAC" class="h-full w-full object-cover object-top">
            <div class="absolute inset-0 hidden bg-gradient-to-r from-[#F9F6F3]/60 via-transparent to-transparent lg:block">
            </div>
            <div class="absolute bottom-0 left-0 right-0 border-t border-white/10 bg-[#1F1F1F]/90 px-6 py-6 shadow-2xl backdrop-blur-md md:px-8">
                <div class="mx-auto grid max-w-xl grid-cols-3 gap-4 md:gap-6">
                    @foreach ([['100%', 'Trámites exitosos'], ['1,000+', 'Clientes satisfechos'], ['14+', 'Años de experiencia']] as [$num, $label])
                        <div class="border-l-2 border-[#B0393F]/60 pl-3 md:pl-5 first:border-l-0 first:pl-0">
                            <p class="font-display mb-1 text-2xl font-semibold leading-none text-white/80 md:text-3xl">{{ $num }}</p>
                            <p class="text-[9px] font-medium uppercase tracking-[.1em] text-white/60 md:text-[10px]">{{ $label }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-[#2a2a2a] border-t-[#B0393F] bg-[#1F1F1F]">
        <div class="mx-auto grid max-w-screen-2xl grid-cols-2 md:grid-cols-3">
            @foreach ([['fa-solid fa-scale-balanced', 'Tranquilidad fiscal', 'Gestionamos tus trámites y declaraciones para que cumplas con el SAT sin estrés ni errores.'], ['fa-solid fa-chart-line', 'Estrategia a tu medida', 'Traducimos tus números en acciones claras para optimizar recursos y hacer crecer tu negocio.'], ['fa-regular fa-clock', 'Recupera tu tiempo', 'Absorbemos la carga administrativa para que te enfoques al 100% en dirigir tu empresa.']] as $index => [$icon, $title, $body])
                <div class="reveal flex flex-col gap-2 p-5 transition hover:bg-white/[0.04] sm:p-8 lg:p-10 {{ $index === 0 ? 'border-b border-r border-white/10 md:border-b-0' : ($index === 1 ? 'border-b border-white/10 md:border-b-0 md:border-r' : 'col-span-2 md:col-span-1') }}">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#B0393F]/10 text-lg text-[#B0393F] sm:h-12 sm:w-12 sm:text-xl">
                        <i class="{{ $icon }}"></i>
                    </span>
                    <p class="text-[0.95rem] font-semibold text-white sm:text-base">{{ $title }}</p>
                    <p class="text-[0.8rem] leading-relaxed text-white/55 sm:text-sm sm:leading-6">{{ $body }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="border-y border-[#E4DFDC] bg-white px-6 py-16 md:px-14">
        <div class="mx-auto max-w-6xl">
                        <div class="reveal mb-16 grid grid-cols-1 items-end gap-10 lg:grid-cols-2 lg:gap-12">
                <div>
                    <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                        <span class="block h-px w-5 bg-[#B0393F]"></span>
                        Lo que ofrecemos
                    </p>
                    <h2
                        class="font-display text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                        Nuestros Servicios<br>
                        <em class="not-italic text-[#B0393F]">Personalizados </em>
                    </h2>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="group relative flex flex-col gap-5 rounded-2xl border border-[#E4DFDC] bg-[#F9F6F3] p-8 transition hover:border-[#B0393F]/40 hover:shadow-lg hover:shadow-black/5 md:p-10">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl text-[#B0393F] shadow-sm shadow-black/5">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <div>
                        <h3 class="mb-2 text-3xl font-semibold text-[#1F1F1F]">Persona física</h3>
                        <p class="text-sm leading-7 text-[#6B6568]">
                            Trabajas por tu cuenta, facturas como independiente o tienes un negocio pequeño y
                            quieres declarar bien sin perder tiempo cada mes.
                        </p>
                    </div>

                    <ul class="flex flex-col gap-2 border-t border-[#E4DFDC] pt-5">
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> Declaración mensual y anual
                        </li>
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> RESICO y régimen de honorarios
                        </li>
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> Facturación electrónica
                        </li>
                    </ul>

                    <a href="{{ route('services') }}" class="mt-auto inline-flex items-center gap-2 text-sm font-semibold text-[#B0393F] transition group-hover:gap-3">
                        Ver servicios para mí <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <div class="group relative flex flex-col gap-5 rounded-2xl border border-[#E4DFDC] bg-[#F9F6F3] p-8 transition hover:border-[#B0393F]/40 hover:shadow-lg hover:shadow-black/5 md:p-10">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl text-[#B0393F]">
                        <i class="fa-solid fa-shop"></i>
                    </span>

                    <div>
                        <h3 class="mb-2 text-3xl font-semibold text-[#1F1F1F]">Persona moral / Empresa</h3>
                        <p class="text-sm leading-7 text-[#6B6568]">
                            Tienes una empresa constituida, personal en nómina o un negocio que necesita
                            cumplimiento fiscal y laboral sin descuidos.
                        </p>
                    </div>

                    <ul class="flex flex-col gap-2 border-t border-[#E4DFDC] pt-5">
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> Nómina, IMSS y Hacienda estatal
                        </li>
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> Sucesión de empresas familiares
                        </li>
                        <li class="flex items-baseline gap-2 text-sm text-[#6B6568]">
                            <span class="text-[#B0393F]">→</span> Asistencia en inspecciones del SAT
                        </li>
                    </ul>

                    <a href="{{ route('services') }}" class="mt-auto inline-flex items-center gap-2 text-sm font-semibold text-[#B0393F] transition group-hover:gap-3">
                        Ver servicios para mi empresa <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="cita" class="relative overflow-hidden bg-[#1F1F1F] px-6 py-24 md:px-14">
        <div class="pointer-events-none absolute -right-32 top-10 h-80 w-80 rounded-full bg-[#B0393F]/10 blur-3xl">
        </div>
        <div class="pointer-events-none absolute -left-32 bottom-0 h-80 w-80 rounded-full bg-white/[0.03] blur-3xl">
        </div>

        <div class="relative mx-auto grid max-w-6xl grid-cols-1 items-center gap-12 lg:grid-cols-[1.1fr_.9fr]">

            <div class="reveal-left">
                <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Solicita tu servicio
                </p>

                <h2 class="font-display mb-6 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-white md:text-6xl">
                    Agenda una cita en
                    <em class="not-italic text-[#B0393F]"> nuestro despacho.</em>
                </h2>

                <p class="mb-6 max-w-2xl text-base leading-8 text-white/60">
                    Estamos comprometidos con brindarte una atención profesional y personalizada. Agenda una cita en línea y nos pondremos en contacto.
                </p>
                <p class="mb-10 max-w-2xl text-base leading-8 text-white/60">
                    ¿Tienes dudas o necesitas una cotización? Escríbenos por WhatsApp y con gusto te orientaremos para encontrar la mejor solución para ti o tu empresa.
                </p>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('request-service') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                        <i class="fa-regular fa-calendar text-xl mr-2"></i>
                        Agendar Cita
                    </a>

                    <a href="https://wa.me/529991398765?text=Hola,%20me%20gustar%C3%ADa%20recibir%20informaci%C3%B3n%20sobre%20sus%20servicios.%20%C2%BFPodr%C3%ADan%20ayudarme?" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center rounded-lg border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:border-[#B0393F] hover:bg-[#B0393F]">
                        <i class="fa-brands fa-whatsapp text-xl mr-1"></i>
                        Cotizar Servicio
                    </a>
                </div>
            </div>

            <div class="reveal-right grid grid-cols-2 gap-4">
                @foreach ([['fa-solid fa-user-shield', 'Seguimiento continuo', 'No solo resolvemos un trámite, te acompañamos a largo plazo.'], ['fa-solid fa-handshake-angle', 'Atención personalizada', 'Revisamos tu caso para ofrecerte la mejor solución.'], ['fa-brands fa-signal-messenger', 'Citas virtuales o presenciales ', 'Citas que se adaptan a tus necesidades.'], ['fa-solid fa-chart-line', 'Tranquilidad financiera', 'Paz mental al saber que tus finanzas están en orden.']] as [$icon, $title, $text])
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:p-6 shadow-sm backdrop-blur transition hover:bg-white/[0.06]">
                        <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-[#B0393F]/10 text-xl text-[#B0393F]">
                            <i class="{{ $icon }}"></i>
                        </span>
                        <h3 class="mb-2 text-base font-semibold text-white">{{ $title }}</h3>
                        <p class="text-sm leading-7 text-white/55">{{ $text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative bg-[#F9F6F3] py-24 overflow-hidden">
        <div class="mx-auto max-w-6xl px-6 md:px-14">
            <div class="mb-14 max-w-2xl">
                <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Quienes confian en nosotros
                </p>
                <h2 class="font-display text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                    Testimonios de <br>
                    <em class="not-italic text-[#B0393F]">Nuestros clientes.</em>
                </h2>
            </div>
        </div>
        @php
            $testimonials = [
                [
                    'name' => 'Mariana Couoh',
                    'role' => 'Dueña, Taller de cerámica Xtabay',
                    'quote' =>
                        'Llevaba dos años declarando tarde por mi cuenta. Desde que DSAC tomó mi contabilidad no he vuelto a recibir un solo requerimiento del SAT.',
                    'tag' => 'Persona física',
                ],
                [
                    'name' => 'Ing. Roberto Aguilar',
                    'role' => 'Director, Constructora Peninsular',
                    'quote' =>
                        'Nos ayudaron a poner en orden la nómina de 38 empleados en menos de un mes, justo antes de una revisión del IMSS que terminó sin observaciones.',
                    'tag' => 'Persona moral',
                ],
                [
                    'name' => 'Lucía Pacheco',
                    'role' => 'Médica, consulta privada',
                    'quote' =>
                        'El diagnóstico gratuito me detectó deducciones que no estaba aplicando. Solo eso ya pagó el servicio del primer año.',
                    'tag' => 'Persona física',
                ],
                [
                    'name' => 'Carlos Mendoza',
                    'role' => 'Fundador, TechSolutions MX',
                    'quote' =>
                        'La asesoría fiscal de DSAC fue clave para estructurar nuestra empresa. Su equipo es muy profesional y siempre están disponibles para aclarar dudas.',
                    'tag' => 'Persona moral',
                ],
                [
                    'name' => 'Ana Sofía Ruiz',
                    'role' => 'Freelance y Creadora',
                    'quote' =>
                        'Me daba mucho miedo el tema de los impuestos, pero con ellos entendí cómo facturar correctamente y optimizar mis deducciones. ¡Recomendados!',
                    'tag' => 'Persona física',
                ]
            ];
        @endphp

        <div class="relative w-full mt-4 md:mt-10">
            <div class="flex w-full snap-x snap-mandatory gap-6 overflow-x-auto pb-16 md:pb-24 pt-4 pl-6 md:pl-14 xl:pl-[calc((100vw-1152px)/2+3.5rem)] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                @foreach ($testimonials as $index => $t)
                    <div class="w-[85vw] max-w-[420px] shrink-0 snap-center md:snap-start flex">
                        <div class="flex w-full flex-col gap-6 rounded-[2rem] border border-[#E4DFDC] bg-white p-8 md:p-10 shadow-sm shadow-black/5 group">

                            <div class="flex items-start justify-between gap-4">
                                <div class="flex flex-col gap-2">
                                    <span class="font-medium text-[#1F1F1F] text-md">Calificación:</span>
                                    <div class="flex gap-1 text-[#B0393F]">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star text-sm"></i>
                                        @endfor
                                    </div>
                                </div>
                                <span class="shrink-0 rounded-full bg-[#5C6B4F]/10 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-[.06em] text-[#5C6B4F]">
                                    {{ $t['tag'] }}
                                </span>
                            </div>

                            <p class="text-[1.05rem] leading-relaxed text-[#1F1F1F]">
                                “{{ $t['quote'] }}”
                            </p>

                            <div class="mt-auto flex items-center gap-4 border-t border-[#E4DFDC]/60 pt-6">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#B0393F]/10 text-base font-semibold text-[#B0393F]">
                                    {{ collect(explode(' ', $t['name']))->map(fn($n) => mb_substr($n, 0, 1))->take(2)->join('') }}
                                </div>
                                <div>
                                    <p class="text-[0.95rem] font-semibold text-[#1F1F1F]">{{ $t['name'] }}</p>
                                    <p class="text-[0.8rem] text-[#6B6568]">{{ $t['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contacto" class="bg-white px-6 py-24 md:px-14">
        <div class="mx-auto grid max-w-6xl grid-cols-1 items-start gap-16 lg:grid-cols-[1.15fr_1fr] lg:gap-20">

            <div class="reveal-left">
                <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Resolvemos tus dudas
                </p>

                <h2
                    class="font-display mb-12 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                    Preguntas
                    <em class="not-italic text-[#B0393F]"> Frecuentes</em>
                </h2>

                @php
                    $faqs = [
                        [
                            'q' => '¿Por qué es importante tener un contador?',
                            'a' =>
                                'Tener un contador es fundamental para cualquier persona física o moral que desee cumplir con sus obligaciones fiscales de manera correcta y oportuna. Un contador te puede ayudar a evitar errores en tus declaraciones, optimizar tus recursos y hacer crecer tu negocio. Además, te puede asesorar en temas relacionados con el SAT, el IMSS y/o Hacienda.',
                        ],
                        [
                            'q' => '¿Cómo puedo recuperar mi e.firma si la perdí?',
                            'a' =>
                                'Claro. Te apoyamos para tramitar, renovar o recuperar tu Firma Electrónica ante el SAT y tu Firma Digital ante el IMSS.',
                        ],
                        [
                            'q' => '¿Pueden regularizarme si no estoy al corriente con mis impuestos?',
                            'a' =>
                                'Sí, claro que sí. Te apoyamos para regularizar tu situación fiscal y contable ante el SAT, el IMSS y Hacienda.',
                        ],
                        [
                            'q' => '¿Necesito ir a su oficina cada mes?',
                            'a' =>
                                'No es obligatorio. Podemos trabajar con herramientas digitales para llevar tu contabilidad de manera remota y segura si así lo prefieres. Nosotros nos adaptamos a tus necesidades.',
                        ],
                        [
                            'q' => '¿Trabajan con empresas grandes o pequeñas?',
                            'a' =>
                                'Sí, claro que sí. Trabajamos con personas físicas y morales, desde emprendimientos hasta empresas consolidadas. Cada negocio tiene necesidades distintas y diseñamos un servicio personalizado para cada uno.',
                        ],
                        [
                            'q' => '¿Cómo contrato uno alguno de sus servicios?',
                            'a' =>
                                'Los costos varían según el tipo de servicio y la complejidad de tu situación. Solicita tu diagnóstico gratuito para recibir una propuesta personalizada.',
                        ],
                    ];
                @endphp

                <div class="overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-black/5">
                    @foreach ($faqs as $i => $faq)
                        <details class="group border-b border-[#E4DFDC] last:border-b-0">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-5 px-5 py-5 transition hover:bg-[#F9F6F3] md:px-6">
                                <span class="text-base font-semibold leading-7 text-[#1F1F1F] transition group-open:text-[#B0393F]">
                                    {{ $faq['q'] }}
                                </span>

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-[#E4DFDC] text-[#6B6568] transition group-open:rotate-45 group-open:border-[#B0393F] group-open:bg-[#B0393F] group-open:text-white">
                                    +
                                </span>
                            </summary>

                            <div class="px-5 pb-5 pr-10 md:px-6">
                                <p class="text-sm leading-8 text-[#6B6568]">
                                    {{ $faq['a'] }}
                                </p>
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>

            <div class="reveal-right flex flex-col gap-6 lg:sticky lg:top-24">
                <div class="flex flex-col gap-5 rounded-2xl border border-[#E4DFDC] bg-[#F9F6F3] p-8 shadow-lg shadow-black/5">
                    <div class="relative">
                        <p class="mb-3 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                            <span class="block h-px w-5 bg-[#B0393F]"></span>
                            Contacto directo
                        </p>
                        <h4 class="font-display mb-3 text-3xl font-semibold leading-[1.05] text-gray-700">¿Tienes más dudas?</h4>
                        <p class="text-sm leading-7 text-gray-500">
                            Contáctanos directamente o agenda una reunión sin costo ni compromiso. Respondemos en menos
                            de 24 horas.
                        </p>
                    </div>
                    <div class="relative flex flex-col gap-4 border-t border-white/10 pt-6">
                        @foreach ([['fa-solid fa-envelope', 'contacto@dsac.com'], ['fa-solid fa-phone', '+52 999 139 8765']] as [$icon, $text])
                            <div class="flex items-start text-sm leading-6 text-gray-800">
                                <span
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/10 text-sm text-[#B0393F]">
                                    <i class="{{ $icon }}"></i>
                                </span>

                                <span class="pt-1">{{ $text }}</span>
                            </div>
                        @endforeach
                    </div>

                    <a href="https://wa.me/529991398765?text=Hola,%20me%20gustar%C3%ADa%20recibir%20informaci%C3%B3n%20sobre%20sus%20servicios.%20%C2%BFPodr%C3%ADan%20ayudarme?" target="_blank" rel="noopener noreferrer"
                        class="relative mt-1 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-[#B0393F] px-4 py-3.5 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/30 transition hover:bg-[#c4444b]">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        Contáctanos
                    </a>

                    <div class="overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-black/5">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.525554927982!2d-89.6434999!3d21.0116472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56758a2c68516d%3A0x965e480173b754f2!2sDSAC%20%7C%20Despacho%20de%20Servicios%20y%20Asesoria%20Fiscal!5e0!3m2!1ses!2smx!4v1780146380190!5m2!1ses!2smx"
                            class="h-56 w-full" style="border: none; filter: grayscale(8%) contrast(1.02);"
                            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
    
                        <div class="flex items-center justify-between gap-3 border-t border-[#E4DFDC] px-5 py-4">
                            <p class="text-sm leading-6 text-[#6B6568] p-2 border-r-2 border-[#E4DFDC] ">Calle 21ᴬ #182, Cordeleros de Chuburná, 97203 Mérida, Yucatán</p>
    
                            <a href="https://maps.app.goo.gl/6m8fwCVUGaxvWFQy7" target="_blank" rel="noopener noreferrer" class="flex shrink-0 items-center gap-1.5 text-sm font-semibold text-[#B0393F] transition hover:text-[#8a2d33] p-2">
                                Cómo llegar
                                <i class="fa-solid fa-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-home-layout>