<x-home-layout titleWindow="Solicitar servicio">
    <section class="relative overflow-hidden bg-[#F9F6F3] px-4 pb-24 pt-32 sm:px-6 md:px-10 lg:px-14">
        <div class="relative mx-auto grid max-w-6xl grid-cols-1 items-start gap-12 lg:grid-cols-[0.95fr_1.15fr] lg:gap-16">
            {{-- Columna izquierda --}}
            <div class="reveal-left lg:pt-6">
                {{-- Badge --}}
                <p class="mb-4 flex items-center gap-3 text-xs font-bold uppercase tracking-[.18em] text-[#B0393F]">
                    <span class="block h-px w-5 bg-[#B0393F]"></span>
                    Solicitud sin cuenta
                </p>

                {{-- Título --}}
                <h1 class="font-display mb-5 max-w-xl text-4xl font-semibold leading-[1.05] tracking-[-0.04em] text-[#1F1F1F] md:text-5xl lg:text-6xl">
                    Solicita tu <span class="block text-[#B0393F]">Servicio Fiscal</span>
                </h1>

                {{-- Descripción --}}
                <p class="mb-10 max-w-[470px] text-base leading-8 text-[#6B6568]">
                    Completa tus datos y un asesor de DSAC se pondrá en contacto contigo para confirmar la cita. 
                    <span class="font-semibold text-[#1F1F1F]">No necesitas crear una cuenta</span> para enviar esta solicitud.
                </p>

                {{-- Información de confianza --}}
                <div class="mb-8 grid max-w-[470px] grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="rounded-xl border border-[#E4DFDC] bg-white p-4 shadow-sm">
                        <p class="text-[11px] font-semibold uppercase tracking-widest text-[#9B9693]">Atención</p>
                        <p class="mt-1 text-sm font-semibold text-[#1F1F1F]">Personalizada</p>
                    </div>

                    <div class="rounded-xl border border-[#E4DFDC] bg-white p-4 shadow-sm">
                        <p class="text-[11px] font-semibold uppercase tracking-widest text-[#9B9693]">Proceso</p>
                        <p class="mt-1 text-sm font-semibold text-[#1F1F1F]">Simple y seguro</p>
                    </div>
                </div>

                {{-- Proceso --}}
                @php
                    $steps = [
                        [
                            'number' => '01',
                            'title' => 'Envías tu solicitud',
                            'description' => 'Registras tus datos principales y el servicio que necesitas.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'Revisamos tu información',
                            'description' => 'Validamos el servicio solicitado y la disponibilidad de atención.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'Confirmamos tu cita',
                            'description' => 'Un asesor se pondrá en contacto contigo para finalizar el proceso.',
                        ],
                    ];
                @endphp

                <div class="max-w-[470px] rounded-2xl border border-[#E4DFDC] bg-white p-5 shadow-sm">
                    <div class="mb-5 border-b border-[#E4DFDC] pb-4">
                        <p class="text-sm font-semibold text-[#1F1F1F]">¿Cómo funciona? </p>
                        <p class="mt-1 text-sm leading-6 text-[#6B6568]"> El proceso es rápido y no requiere una cuenta de usuario.</p>
                    </div>

                    <div class="space-y-5">
                        @foreach ($steps as $step)
                            <div class="flex gap-4">
                                <div class="flex flex-col items-center">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#B0393F]/10 text-xs font-bold text-[#B0393F]">
                                        {{ $step['number'] }}
                                    </span>
                                    @if (!$loop->last)
                                        <span class="mt-3 h-full w-px bg-[#E4DFDC]"></span>
                                    @endif
                                </div>

                                <div class="pb-1">
                                    <p class="text-sm font-semibold text-[#1F1F1F]">{{ $step['title'] }}</p>
                                    <p class="mt-1 text-sm leading-6 text-[#6B6568]">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Columna derecha: formulario --}}
            <div
                class="reveal-right relative overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white shadow-lg shadow-[#1F1F1F]/[0.06]">

                {{-- Barra superior --}}
                <div class="h-1 bg-[#B0393F]"></div>

                <div class="p-6 sm:p-8 md:p-10">
                    <div class="mb-7 border-b border-[#E4DFDC] pb-6">
                        <h3 class="text-4xl font-semibold tracking-[-0.02em] text-[#1F1F1F]">Datos de la solicitud</h3>
                        <p class="mt-2 text-sm leading-6 text-[#6B6568]">Tu información será usada únicamente para coordinar tu cita.</p>
                    </div>
                    @include('home.includes.appointment-form')
                </div>
            </div>
        </div>
    </section>
</x-home-layout>
