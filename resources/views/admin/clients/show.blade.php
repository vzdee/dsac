<x-admin-layout titleWindow="Detalles Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes', 'href' => route('admin.clients.index')],
    ['name' => 'Detalles Cliente'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.clients.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a clientes" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Ver Detalles Cliente</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes revisar toda la información del
                    cliente, incluyendo sus datos generales, información fiscal, historial de citas y documentos
                    relacionados. Utiliza las pestañas para navegar entre las diferentes secciones y obtener una visión
                    completa del cliente.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <div class="border border-gray-200 rounded-lg p-4 mb-6">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center gap-4">
                    <img src="{{ $client->user->profile_photo_url }}" alt="{{ $client->user->name }}"
                        class="h-20 w-20 rounded-full object-cover object-center">
                    <div>
                        <span
                            class="text-xl font-medium text-gray-800">{{ $client->user->name . ' ' . $client->user->last_name }}</span>
                        <p class="ms2 text-sm text-gray-500">{{ $client->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <x-tab :active="$defaultTab">
            {{-- tab links --}}
            <x-slot name="header">
                <x-tab-link tab="general-data">
                    <i class="fa-solid fa-user me-2"></i>
                    Datos Generales
                </x-tab-link>

                <x-tab-link tab="fiscal-data">
                    <i class="fa-solid fa-file-invoice me-2"></i>
                    Datos Fiscales
                </x-tab-link>

                <x-tab-link tab="appointment-history">
                    <i class="fa-solid fa-calendar-days me-2"></i>
                    Historial de Citas
                </x-tab-link>

                <x-tab-link tab="documents">
                    <i class="fa-solid fa-folder-open me-2"></i>
                    Documentos
                </x-tab-link>
            </x-slot>

            {{-- tab content --}}
            {{-- general data --}}
            <x-tab-content tab="general-data">
                <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Información vinculada al usuario</h2>
                            <p class="mt-1 text-sm text-gray-500"><span class="text-red-500">*</span> Si deseas
                                modificar nombre, correo o teléfono, edita directamente el usuario asociado.</p>
                        </div>
                        <x-ts-button href="{{ route('admin.users.edit', $client->user->id) }}" color="indigo" outline
                            sm>
                            <i class="fa-solid fa-up-right-from-square mr-1"></i>
                            Editar Usuario
                        </x-ts-button>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Generales</h2>
                    <h3 class=" text-gray-600 mb-2">ID Usuario: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->id }}</em> </h3>
                    <h3 class=" text-gray-600 mb-2">Nombre Completo: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->name . ' ' . $client->user->last_name }}
                        </em> </h3>
                    <h3 class=" text-gray-600 mb-2">Género: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->gender === 'male' ? 'Masculino' : ($client->user->gender === 'female' ? 'Femenino' : 'No especificado') }}</em>
                    </h3>
                    <h3 class=" text-gray-600 mb-2">Fecha de Nacimiento: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->birth_date ? $client->user->birth_date->format('d M Y') : 'No especificada' }}</em>
                    </h3>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl font-medium text-gray-800 mb-2">Contacto</h2>
                    <h3 class=" text-gray-600 mb-2">Correo Electrónico: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->email }}</em> </h3>
                    <h3 class=" text-gray-600 mb-2">Teléfono: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->user->phone_number }}</em> </h3>
                </div>
            </x-tab-content>

            {{-- fiscal data --}}
            <x-tab-content tab="fiscal-data">
                <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Información vinculada al cliente</h2>
                            <p class="mt-1 text-sm text-gray-500"><span class="text-red-500">*</span> Si deseas
                                modificar algún dato importante del usuario, entonces edita directamente el cliente
                                asociado.</p>
                        </div>
                        <x-ts-button href="{{ route('admin.clients.edit', $client->id) }}" color="indigo" outline sm>
                            <i class="fa-solid fa-up-right-from-square mr-1"></i>
                            Editar Cliente
                        </x-ts-button>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl font-medium text-gray-800 mb-2">Información Domiciliaria</h2>
                    <h3 class=" text-gray-600 mb-2">Dirección: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->address ?? 'Sin datos registrados' }}</em>
                    </h3>
                    <h3 class=" text-gray-600 mb-2">Código Postal: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->postal_code ?? 'Sin datos registrados' }}
                        </em> </h3>
                    <h3 class=" text-gray-600 mb-2">Estado: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->state ?? 'Sin datos registrados' }}
                        </em> </h3>
                    <h3 class=" text-gray-600 mb-2">Municipio: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->municipality ?? 'Sin datos registrados' }}
                        </em> </h3>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Fiscales</h2>
                    <h3 class=" text-gray-600 mb-2">Constancia de Situación Fiscal: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->rfc ?? 'Sin datos registrados' }}</em>
                    </h3>
                    <h3 class=" text-gray-600 mb-2">CURP: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->curp ?? 'Sin datos registrados' }}</em>
                    </h3>
                    <h3 class=" text-gray-600 mb-2">Razón Social: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->social_reason ?? 'Sin datos registrados' }}</em>
                    </h3>
                    <h3 class=" text-gray-600 mb-2">Régimen Fiscal: <em
                            class="text-gray-800 font-medium not-italic">{{ $client->fiscal_regime ?? 'Sin datos registrados' }}</em>
                    </h3>

                </div>
            </x-tab-content>

            {{-- appointment history --}}
            <x-tab-content tab="appointment-history">
                <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Historial de Citas</h2>
                            <p class="mt-1 text-sm text-gray-500">Aquí puedes revisar el historial completo de citas del
                                cliente, incluyendo detalles como fecha, hora, servicio solicitado y estado de cada
                                cita.</p>
                        </div>
                    </div>
                </div>
            </x-tab-content>

            {{-- documents --}}
            <x-tab-content tab="documents">
                <div class="lg:col-span-2">
                    <div>
                        <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800">Documentos del Cliente</h2>
                                    <p class="mt-1 text-sm text-gray-500">Puedes descargar, visualizar el documento ligado al cliente, 
                                        también si falta algun documento pendiente o faltante puedes subirlo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-100 mt-4 rounded-lg">
                            <div
                                class="flex flex-col gap-4 p-4 transition hover:bg-gray-50 md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-red-50 text-red-600">
                                        <i class="fa-solid fa-file-pdf text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Constancia de Situación Fiscal.pdf</h4>
                                        <div class="mt-1 flex flex-wrap items-center gap-2">
                                            <span class="text-sm text-gray-500">14 Jun 2026</span>
                                            <span class="text-gray-300">•</span>
                                            <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-700">Vigente</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 cursor-pointer">
                                        <i class="fa-solid fa-eye"></i>
                                        Ver
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center gap-2 rounded-lg bg-[#B0393F] px-4 py-2 text-sm font-medium text-white transition hover:opacity-90 cursor-pointer">
                                        <i class="fa-solid fa-download"></i> 
                                        Descargar
                                    </button>
                                </div>
                            </div>

                            <div class="flex flex-col gap-4 p-4 transition hover:bg-gray-50 md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                                        <i class="fa-solid fa-file-lines text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Identificación Oficial.pdf</h4>
                                        <div class="mt-1 flex flex-wrap items-center gap-2">
                                            <span class="text-sm text-gray-500">10 Jun 2026</span>
                                            <span class="text-gray-300">•</span>
                                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-700">Por vencer</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 cursor-pointer">
                                        <i class="fa-solid fa-eye"></i>
                                        Ver
                                    </button>
                                    <button type="button"
                                        class="inline-flex items-center gap-2 rounded-lg bg-[#B0393F] px-4 py-2 text-sm font-medium text-white transition hover:opacity-90 cursor-pointer">
                                        <i class="fa-solid fa-download"></i>
                                        Descargar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-tab-content>
        </x-tab>
    </div>

</x-admin-layout>
