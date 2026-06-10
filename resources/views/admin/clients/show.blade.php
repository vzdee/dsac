<x-admin-layout titleWindow="Detalles Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes', 'href' => route('admin.clients.index')],
    ['name' => 'Detalles Cliente'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.clients.index') }}" class="inline-flex w-fit" outline sm text="Volver a clientes" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Ver Detalles Cliente</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes revisar toda la información del cliente, incluyendo sus datos generales, información fiscal, historial de citas y documentos relacionados. Utiliza las pestañas para navegar entre las diferentes secciones y obtener una visión completa del cliente.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
            <div class="border border-gray-200 rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $client->user->profile_photo_url }}" alt="{{ $client->user->name }}" class="h-20 w-20 rounded-full object-cover object-center">
                        <div>
                            <span class="text-xl font-medium text-gray-800">{{ $client->user->name . ' ' . $client->user->last_name }}</span>
                            <p class="ms2 text-sm text-gray-500">{{ $client->user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <x-tab :active="$defaultTab">
                {{-- tab links --}}
                <x-slot name="header">
                    <x-tab-link tab="general-data" >
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
                                <p class="mt-1 text-sm text-gray-500">Si deseas modificar nombre, correo o teléfono, edita directamente el usuario asociado.</p>
                            </div>
                            <x-ts-button href="{{ route('admin.users.edit', $client->user->id) }}" color="indigo"  outline sm>
                                <i class="fa-solid fa-up-right-from-square mr-1"></i>
                                Editar usuario
                            </x-ts-button>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Generales</h2>
                        <h3 class=" text-gray-600 mb-2">ID Usuario: <em class="text-gray-800 font-medium not-italic">{{ $client->user->id }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Nombre Completo: <em class="text-gray-800 font-medium not-italic">{{ $client->user->name . ' ' . $client->user->last_name }} </em> </h3>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Contacto</h2>
                        <h3 class=" text-gray-600 mb-2">Correo Electrónico: <em class="text-gray-800 font-medium not-italic">{{ $client->user->email }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Teléfono: <em class="text-gray-800 font-medium not-italic">{{ $client->user->phone_number }}</em> </h3>
                    </div>
                </x-tab-content>
                
                {{-- fiscal data --}}
                <x-tab-content tab="fiscal-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Información vinculada al cliente</h2>
                                <p class="mt-1 text-sm text-gray-500"><span class="text-red-500">*</span> Si deseas modificar algún dato importante del usuario, entonces edita directamente el cliente asociado.</p>
                            </div>
                            <x-ts-button href="{{ route('admin.clients.edit', $client->id) }}" color="indigo"  outline sm>
                                <i class="fa-solid fa-up-right-from-square mr-1"></i>
                                Editar Cliente
                            </x-ts-button>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Dirección</h2>
                        <h3 class=" text-gray-600 mb-2">Dirección: <em class="text-gray-800 font-medium not-italic">{{ $client->address ?? 'Sin datos registrados' }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Código Postal: <em class="text-gray-800 font-medium not-italic">{{ $client->postal_code ?? 'Sin datos registrados' }} </em> </h3>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Fiscales</h2>
                        <h3 class=" text-gray-600 mb-2">Constancia de Situación Fiscal: <em class="text-gray-800 font-medium not-italic">{{ $client->rfc ?? 'Sin datos registrados' }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">CURP: <em class="text-gray-800 font-medium not-italic">{{ $client->curp ?? 'Sin datos registrados' }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Razón Social: <em class="text-gray-800 font-medium not-italic">{{ $client->social_reason ?? 'Sin datos registrados' }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Régimen Fiscal: <em class="text-gray-800 font-medium not-italic">{{ $client->fiscal_regime ?? 'Sin datos registrados' }}</em> </h3>

                    </div>
                </x-tab-content>

                {{-- appointment history --}}
                <x-tab-content tab="appointment-history">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Historial de Citas</h2>
                                <p class="mt-1 text-sm text-gray-500">Aquí puedes revisar el historial completo de citas del cliente, incluyendo detalles como fecha, hora, servicio solicitado y estado de cada cita.</p>
                            </div>
                        </div>
                    </div>
                </x-tab-content>
                
                {{-- documents --}}
                <x-tab-content tab="documents">
                    <div class="bg-gray-100 rounded-xl border border-gray-200 p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">INE: </h2>
                        <div class="flex flex-col items-center justify-center border border-gray-300 py-5">
                            <i class="fa-regular fa-file"></i>
                            <span class="text-sm text-gray-400">Recuerda documentos</span>
                        </div>
                        <div class="mt-10">
                            <x-ts-button text="Ver Documento" color="green" icon="eye" outline sm />
                            <x-ts-button text="Descargar Documento" color="blue" icon="arrow-down" outline sm />
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl border border-gray-200 p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">RFC: </h2>
                        <div class="flex flex-col items-center justify-center border border-gray-300 py-5">
                            <i class="fa-regular fa-file"></i>
                            <span class="text-sm text-gray-400">Recuerda documentos</span>
                        </div>
                        <div class="mt-10">
                            <x-ts-button text="Ver Documento" color="green" icon="eye" outline sm />
                            <x-ts-button text="Descargar Documento" color="blue" icon="arrow-down" outline sm />
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl border border-gray-200 p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">CURP: </h2>
                        <div class="flex flex-col items-center justify-center border border-gray-300 py-5">
                            <i class="fa-regular fa-file"></i>
                            <span class="text-sm text-gray-400">Recuerda documentos</span>
                        </div>
                        <div class="mt-10">
                            <x-ts-button text="Ver Documento" color="green" icon="eye" outline sm />
                            <x-ts-button text="Descargar Documento" color="blue" icon="arrow-down" outline sm />
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl border border-gray-200 p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Comprobante Domicilio: </h2>
                        <div class="flex flex-col items-center justify-center border border-gray-300 py-5">
                            <i class="fa-regular fa-file"></i>
                            <span class="text-sm text-gray-400">Recuerda documentos</span>
                        </div>
                        <div class="mt-10">
                            <x-ts-button text="Ver Documento" color="green" icon="eye" outline sm />
                            <x-ts-button text="Descargar Documento" color="blue" icon="arrow-down" outline sm />
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl border border-gray-200 p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Acta de Nacimiento: </h2>
                        <div class="flex flex-col items-center justify-center border border-gray-300 py-5">
                            <i class="fa-regular fa-file"></i>
                            <span class="text-sm text-gray-400">Recuerda documentos</span>
                        </div>
                        <div class="mt-10">
                            <x-ts-button text="Ver Documento" color="green" icon="eye" outline sm />
                            <x-ts-button text="Descargar Documento" color="blue" icon="arrow-down" outline sm />
                        </div>
                    </div>
                </x-tab-content>
            </x-tab>
    </div>

</x-admin-layout>
