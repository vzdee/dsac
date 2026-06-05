<x-home-layout titleWindow="Inicio"
    description="Despacho de Servicios y Asesoría Contable Fiscal en Mérida, Yucatán. Diagnóstico gratuito, asesoría personalizada y atención fiscal profesional.">

    {{-- HERO --}}
    <section id="inicio" class="relative grid min-h-screen grid-cols-1 overflow-hidden bg-[#F9F6F3] pt-16 lg:grid-cols-[55%_45%]">

        {{-- Decoración sutil --}}
        <div class="pointer-events-none absolute -left-40 top-20 h-[420px] w-[420px] rounded-full bg-[#B0393F]/[0.05] blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 left-1/3 h-[320px] w-[320px] rounded-full bg-[#1F1F1F]/[0.035] blur-3xl"></div>

        {{-- LEFT --}}
        <div class="reveal-left relative z-10 flex flex-col justify-center px-6 py-20 sm:px-8 md:px-14 lg:px-16 lg:py-0">

            <h1 class="font-display mb-8 max-w-4xl text-5xl font-semibold leading-[.96] tracking-[-.045em] text-[#1F1F1F] md:text-6xl lg:text-7xl">
                Tu contabilidad,<br>
                <em class="not-italic text-[#B0393F]">inteligente.</em>
            </h1>

            <p class="mb-10 max-w-xl border-l-2 border-[#B0393F] pl-5 text-base leading-8 text-[#6B6568] md:text-[1.02rem]">
                Despacho contable y fiscal de confianza. Diagnóstico gratuito, asesoría 100% personalizada y un equipo
                que se anticipa a cada reto del SAT.
            </p>

            <ul class="mb-10 flex max-w-xl flex-col gap-3">
                @foreach (['Diagnóstico claro de tu situación fiscal actual', 'Asesoramiento laboral y formación personal', 'Asistencia en procesos de inspección ante el SAT'] as $item)
                    <li class="flex items-start gap-3 text-sm leading-7 text-[#1F1F1F] md:text-[.95rem]">
                        <span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#B0393F]/10 text-[10px] text-[#B0393F]">
                            <i class="fa-solid fa-check"></i>
                        </span>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="mb-14 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('request-service') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                    Agenda tu cita
                </a>

                <a href="#servicios"
                    class="inline-flex items-center justify-center rounded-lg border border-[#D8D2CF] bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                    Ver servicios →
                </a>
            </div>

            <div class="grid max-w-xl grid-cols-1 gap-3 sm:grid-cols-3">
                @foreach ([['100%', 'Trámites exitosos'], ['1,000+', 'Clientes activos'], ['14+', 'Años de experiencia']] as [$num, $label])
                    <div class="rounded-2xl border border-[#E4DFDC] bg-white/95 p-4 shadow-sm backdrop-blur transition hover:border-[#B0393F]/30 hover:shadow-md">
                        <p class="font-display mb-1 text-3xl font-semibold leading-none text-[#1F1F1F]">
                            {{ $num }}
                        </p>
                        <p class="text-[11px] font-medium uppercase tracking-[.12em] text-[#6B6568]">
                            {{ $label }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="reveal-right relative min-h-[520px] overflow-hidden border-t border-[#E4DFDC] lg:min-h-0 lg:border-l lg:border-t-0">
            <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                alt="Equipo DSAC"
                class="h-full w-full object-cover object-top">

            <div class="absolute inset-0 hidden bg-gradient-to-r from-[#F9F6F3]/60 via-transparent to-transparent lg:block"></div>

            <div class="absolute bottom-0 left-0 right-0 flex flex-col gap-4 border-t border-white/10 bg-[#1F1F1F]/90 px-6 py-5 shadow-2xl backdrop-blur-md sm:flex-row sm:items-center sm:justify-between md:px-7">
                <p class="max-w-sm text-sm leading-7 text-white/70">
                    Diagnóstico gratuito sin compromiso. Primera reunión presencial o virtual.
                </p>

                <a href="{{ route('request-service') }}"
                    class="inline-flex shrink-0 items-center justify-center rounded-lg border border-white/20 px-5 py-3 text-xs font-bold uppercase tracking-[.14em] text-white transition hover:border-[#B0393F] hover:bg-[#B0393F]">
                    Solicitar ahora
                </a>
            </div>
        </div>
    </section>


    {{-- VALUE STRIP --}}
    <section class="border-y border-[#2a2a2a] border-t-[#B0393F] bg-[#1F1F1F]">
        <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-3">
            @foreach ([['fa-solid fa-scale-balanced', 'Tranquilidad fiscal', 'Gestionamos tus trámites y declaraciones para que cumplas con el SAT sin estrés ni errores.'], ['fa-solid fa-diagram-project', 'Estrategia a tu medida', 'Traducimos tus números en acciones claras para optimizar recursos y hacer crecer tu negocio.'], ['fa-solid fa-clock', 'Recupera tu tiempo', 'Absorbemos la carga administrativa para que te enfoques al 100% en dirigir tu empresa.']] as $index => [$icon, $title, $body])
                <div class="reveal flex flex-col gap-4 border-b border-white/10 p-8 transition hover:bg-white/[0.04] md:border-b-0 md:border-r md:border-white/10 lg:p-10 {{ $index === 2 ? 'md:border-r-0' : '' }}">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#B0393F]/10 text-xl text-[#B0393F]">
                        <i class="{{ $icon }}"></i>
                    </span>

                    <p class="text-base font-semibold text-white">
                        {{ $title }}
                    </p>

                    <p class="text-sm leading-8 text-white/55">
                        {{ $body }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>


    {{-- SERVICIOS --}}
    <section id="servicios" class="bg-white px-6 py-24 md:px-14">
        <div class="mx-auto max-w-6xl">

            <div class="reveal mb-16 grid grid-cols-1 items-end gap-10 lg:grid-cols-2 lg:gap-12">
                <div>
                    <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                        <span class="block h-px w-5 bg-[#B0393F]"></span>
                        Lo que ofrecemos
                    </p>

                    <h2 class="font-display text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                        Nuestros<br>
                        <em class="not-italic text-[#B0393F]">Servicios</em>
                    </h2>
                </div>

                <div>
                    <p class="mb-6 text-base leading-8 text-[#6B6568]">
                        Soluciones contables y fiscales diseñadas para personas físicas, morales y empresas familiares
                        en crecimiento.
                    </p>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('request-service') }}"
                            class="inline-flex items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                            Cotiza tu servicio
                        </a>

                        <a href="{{ route('request-service') }}"
                            class="inline-flex items-center justify-center rounded-lg border border-[#D8D2CF] bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-[#B0393F] hover:bg-[#B0393F]/5 hover:text-[#B0393F]">
                            Agendar asistencia
                        </a>
                    </div>
                </div>
            </div>

            @php
                $services = [
                    [
                        'num' => '01',
                        'title' => 'Asesoría y Consultoría Personal',
                        'items' => [
                            'Asesoría fiscal continua y planificación',
                            'Asistencia en inspecciones del SAT',
                            'Gestión y sucesión de empresas familiares',
                            'Aclaraciones y buzón tributario',
                        ],
                    ],
                    [
                        'num' => '02',
                        'title' => 'Gestión y Cumplimiento ante el SAT',
                        'items' => [
                            'Declaraciones mensuales y anuales',
                            'Facturación electrónica CFDI 4.0',
                            'e.firma y Firma Digital ante IMSS',
                            'Régimen simplificado de confianza',
                        ],
                    ],
                    [
                        'num' => '03',
                        'title' => 'Nómina, IMSS y Hacienda Estatal',
                        'items' => [
                            'Cálculo y timbrado de nómina',
                            'Altas y bajas ante el IMSS',
                            'SUA y aportaciones patronales',
                            'Cumplimiento con Hacienda estatal',
                        ],
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-black/5 md:grid-cols-3">
                @foreach ($services as $index => $service)
                    <div class="group reveal relative flex cursor-default flex-col gap-6 border-b border-[#E4DFDC] bg-white p-8 transition duration-300 hover:bg-[#F9F6F3] md:border-b-0 md:border-r md:p-10 {{ $index === 2 ? 'md:border-r-0' : '' }}">

                        <div class="absolute bottom-0 left-0 right-0 h-0.5 origin-left scale-x-0 bg-[#B0393F] transition-transform duration-300 group-hover:scale-x-100"></div>

                        <span class="font-display text-7xl font-semibold leading-none text-[#E4DFDC] transition group-hover:text-[#B0393F]/30">
                            {{ $service['num'] }}
                        </span>

                        <h3 class="text-lg font-semibold leading-7 text-[#1F1F1F]">
                            {{ $service['title'] }}
                        </h3>

                        <ul class="flex flex-col gap-3">
                            @foreach ($service['items'] as $item)
                                <li class="flex items-baseline gap-3 text-sm leading-7 text-[#6B6568]">
                                    <span class="shrink-0 text-xs font-bold text-[#B0393F]">→</span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- NOSOTROS --}}
    <section id="nosotros" class="grid min-h-[75vh] grid-cols-1 bg-[#F9F6F3] lg:grid-cols-[45%_55%]">

        <div class="reveal-left relative min-h-80 overflow-hidden lg:min-h-0">
            <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                alt="Equipo DSAC"
                class="h-full w-full object-cover object-top">

            <div class="absolute inset-0 bg-gradient-to-t from-[#1F1F1F]/30 via-transparent to-transparent lg:hidden"></div>

            <div class="absolute bottom-0 left-0 right-0 grid grid-cols-4 bg-[#B0393F] lg:bottom-auto lg:left-auto lg:right-0 lg:top-0 lg:h-full lg:w-32 lg:grid-cols-1">
                @foreach ([['100%', 'Trámites exitosos'], ['1K+', 'Clientes'], ['14+', 'Años de exp.'], ['100%', 'Remoto posible']] as [$number, $label])
                    <div class="flex flex-col items-center justify-center border-r border-white/15 px-3 py-4 text-center last:border-r-0 lg:border-b lg:border-r-0 lg:last:border-b-0">
                        <strong class="font-display mb-1 block text-xl font-semibold leading-none text-white lg:text-3xl">
                            {{ $number }}
                        </strong>

                        <span class="block text-[10px] uppercase leading-snug tracking-[.08em] text-white/75">
                            {{ $label }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="reveal-right flex flex-col justify-center px-6 py-20 sm:px-8 md:px-16">
            <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                <span class="block h-px w-5 bg-[#B0393F]"></span>
                Quiénes somos
            </p>

            <h2 class="font-display mb-8 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                Sobre <em class="not-italic text-[#B0393F]">Nosotros</em>
            </h2>

            <blockquote class="font-display mb-8 border-l-4 border-[#B0393F] pl-5 text-xl italic leading-8 text-[#1F1F1F]">
                “Más allá de los números — construimos relaciones cimentadas en confianza mutua.”
            </blockquote>

            <div class="mb-10 flex max-w-2xl flex-col gap-4">
                <p class="text-base leading-8 text-[#6B6568]">
                    Fundado en 2012, en
                    <strong class="font-semibold text-[#B0393F]">DSAC</strong>
                    tenemos un propósito claro: transformar tu contabilidad en una verdadera herramienta de crecimiento.
                    Nuestra filosofía se basa en construir
                    <strong class="font-semibold text-[#B0393F]">relaciones sólidas y duraderas</strong>
                    con cada cliente.
                </p>

                <p class="text-base leading-8 text-[#6B6568]">
                    Como tus <strong class="font-semibold text-[#B0393F]">aliados estratégicos</strong>,
                    garantizamos calidad impecable mediante un
                    <strong class="font-semibold text-[#B0393F]">trato directo y 100% personalizado</strong>.
                    Nos anticipamos a los retos fiscales para brindarte soluciones rápidas y eficaces.
                </p>
            </div>

            <a href="{{ route('request-service') }}"
                class="inline-flex w-fit items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                Diagnóstico gratuito
            </a>
        </div>
    </section>


    {{-- CTA --}}
    <section id="cita" class="relative overflow-hidden bg-[#1F1F1F] px-6 py-24 md:px-14">
        <div class="pointer-events-none absolute -right-32 top-10 h-80 w-80 rounded-full bg-[#B0393F]/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-32 bottom-0 h-80 w-80 rounded-full bg-white/[0.03] blur-3xl"></div>

        <div class="relative mx-auto grid max-w-6xl grid-cols-1 items-center gap-12 lg:grid-cols-[1.1fr_.9fr]">

            <div class="reveal-left">
                <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Solicitud sin cuenta
                </p>

                <h2 class="font-display mb-6 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-white md:text-6xl">
                    Agenda una cita en
                    <em class="not-italic text-[#B0393F]"> nuestro despacho</em>
                </h2>

                <p class="mb-8 max-w-2xl text-base leading-8 text-white/60">
                    Envíanos tus datos y un asesor te contactará para confirmar el servicio, resolver dudas
                    y definir la fecha de atención. No necesitas crear una cuenta para solicitar una cita.
                </p>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('request-service') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                        Solicitar servicio
                    </a>

                    <a href="https://wa.me/529999999999" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center rounded-lg border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:border-[#B0393F] hover:bg-[#B0393F]">
                        Vía WhatsApp
                    </a>
                </div>
            </div>

            <div class="reveal-right grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach ([['fa-solid fa-user-check', 'No necesitas cuenta', 'Puedes enviar tu solicitud como invitado.'], ['fa-solid fa-handshake-angle', 'Atención personalizada', 'Revisamos tu caso antes de confirmar.'], ['fa-solid fa-calendar-days', 'Citas presenciales o virtuales', 'Elige la opción que mejor se adapte a ti.'], ['fa-solid fa-chart-line', 'Seguimiento desde tu panel', 'Si tienes cuenta, podrás consultar tus citas.']] as [$icon, $title, $text])
                    <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 shadow-sm backdrop-blur transition hover:bg-white/[0.06]">
                        <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-[#B0393F]/10 text-xl text-[#B0393F]">
                            <i class="{{ $icon }}"></i>
                        </span>

                        <h3 class="mb-2 text-base font-semibold text-white">
                            {{ $title }}
                        </h3>

                        <p class="text-sm leading-7 text-white/55">
                            {{ $text }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- FAQ --}}
    <section id="faq" class="bg-white px-6 py-24 md:px-14">
        <div class="mx-auto grid max-w-6xl grid-cols-1 items-start gap-16 lg:grid-cols-[1.15fr_1fr] lg:gap-20">

            <div class="reveal-left">
                <p class="mb-5 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Resolvemos tus dudas
                </p>

                <h2 class="font-display mb-12 text-5xl font-semibold leading-[.96] tracking-[-.03em] text-[#1F1F1F] md:text-6xl">
                    Preguntas
                    <em class="not-italic text-[#B0393F]"> Frecuentes</em>
                </h2>

                @php
                    $faqs = [
                        [
                            'q' => '¿Me asesoran con la emisión de facturas electrónicas (CFDI)?',
                            'a' => 'Sí. Te asesoramos para emitir facturas cumpliendo con las últimas normativas del SAT, asegurando que todos tus ingresos y deducciones queden correctamente registrados.',
                        ],
                        [
                            'q' => 'Mi e.firma está vencida o la perdí, ¿me ayudan?',
                            'a' => 'Claro. Te apoyamos para tramitar, renovar o recuperar tu Firma Electrónica ante el SAT y tu Firma Digital ante el IMSS.',
                        ],
                        [
                            'q' => '¿Cómo funciona el Diagnóstico Gratuito?',
                            'a' => 'En nuestra primera reunión revisamos tu situación fiscal y contable sin costo ni compromiso. Esto nos permite detectar áreas de oportunidad y ofrecerte una propuesta transparente.',
                        ],
                        [
                            'q' => '¿Necesito ir a su oficina cada mes?',
                            'a' => 'No es obligatorio. Podemos trabajar con herramientas digitales para llevar tu contabilidad de manera remota y segura si así lo prefieres.',
                        ],
                        [
                            'q' => '¿Trabajan con personas físicas y morales?',
                            'a' => 'Sí. Atendemos personas físicas y personas morales, incluyendo empresas familiares en distintos regímenes fiscales.',
                        ],
                        [
                            'q' => '¿Cuánto cuesta el servicio?',
                            'a' => 'Los costos varían según el tipo de servicio y la complejidad de tu situación. Solicita tu diagnóstico gratuito para recibir una propuesta personalizada.',
                        ],
                    ];
                @endphp

                <div class="overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-black/5">
                    @foreach ($faqs as $i => $faq)
                        <details class="group border-b border-[#E4DFDC] last:border-b-0" {{ $i === 0 ? 'open' : '' }}>
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

            <div id="contacto" class="reveal-right flex flex-col gap-6 lg:sticky lg:top-24">

                <div class="flex flex-col gap-5 rounded-2xl border border-[#E4DFDC] bg-[#F9F6F3] p-8 shadow-lg shadow-black/5">
                    <div>
                        <h4 class="font-display mb-2 text-3xl font-semibold text-[#1F1F1F]">
                            ¿Tienes más dudas?
                        </h4>

                        <p class="text-sm leading-8 text-[#6B6568]">
                            Contáctanos directamente o agenda una reunión sin costo ni compromiso. Respondemos en menos
                            de 24 horas.
                        </p>
                    </div>

                    @foreach ([['fa-solid fa-map-marker-alt', 'Chuburná 21, Cordeleros de Chuburná, Mérida, Yucatán.'], ['fa-solid fa-envelope', 'desac@gmail.com'], ['fa-solid fa-phone', '+52 999 999 9999']] as [$icon, $text])
                        <div class="flex items-start gap-3 text-sm leading-7 text-[#1F1F1F]">
                            <span class="mt-1 text-[#B0393F]">
                                <i class="{{ $icon }}"></i>
                            </span>

                            <span>{{ $text }}</span>
                        </div>
                    @endforeach

                    <a href="{{ route('request-service') }}"
                        class="mt-2 inline-flex w-fit items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md">
                        Cotiza tu servicio
                    </a>
                </div>

                <div class="overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-black/5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.525554927982!2d-89.6434999!3d21.0116472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56758a2c68516d%3A0x965e480173b754f2!2sDSAC%20%7C%20Despacho%20de%20Servicios%20y%20Asesoria%20Fiscal!5e0!3m2!1ses!2smx!4v1780146380190!5m2!1ses!2smx"
                        class="h-56 w-full"
                        style="border: none;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <div class="border-t border-[#E4DFDC] px-4 py-3 text-sm leading-6 text-[#6B6568]">
                        Chuburná 21, Cordeleros de Chuburná · Mérida, Yucatán, C.P. 97203
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-home-layout>