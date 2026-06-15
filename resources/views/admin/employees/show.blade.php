<x-admin-layout titleWindow="Detalles Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Empleados', 'href' => route('admin.employees.index')],
    ['name' => 'Detalles Empleado'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.employees.index') }}" class="inline-flex w-fit" outline sm text="Volver a empleados" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Ver Empleado</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes revisar toda la información del empleado, incluyendo sus datos generales, información fiscal, historial de citas y documentos relacionados. Utiliza las pestañas para navegar entre las diferentes secciones y obtener una visión completa del empleado.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
            <div class="border border-gray-200 rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $employee->user->profile_photo_url }}" alt="{{ $employee->user->name }}" class="h-20 w-20 rounded-full object-cover object-center">
                        <div>
                            <span class="text-xl font-medium text-gray-800">{{ $employee->user->name . ' ' . $employee->user->last_name }}</span>
                            <p class="ms2 text-sm text-gray-500">{{ $employee->user->email }}</p>
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

                    <x-tab-link tab="appointment-history">
                        <i class="fa-solid fa-calendar-days me-2"></i>
                        Historial de Citas
                    </x-tab-link>
                </x-slot>

                {{-- tab content --}}
                {{-- general data --}}
                <x-tab-content tab="general-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Información vinculada al empleado</h2>
                                <p class="mt-1 text-sm text-gray-500">Si deseas modificar nombre, correo o teléfono, edita directamente el empleado asociado.</p>
                            </div>
                            <x-ts-button href="{{ route('admin.employees.edit', $employee->id) }}" color="indigo"  outline sm>
                                <i class="fa-solid fa-up-right-from-square mr-1"></i>
                                Editar Empleado
                            </x-ts-button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Generales</h2>
                        <h3 class=" text-gray-600 mb-2">ID Empleado: <em class="text-gray-800 font-medium not-italic">{{ $employee->id }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Nombre Completo: <em class="text-gray-800 font-medium not-italic">{{ $employee->user->name . ' ' . $employee->user->last_name }} </em> </h3>
                        <h3 class=" text-gray-600 mb-2">Género: <em class="text-gray-800 font-medium not-italic">{{ $employee->user->gender === 'male' ? 'Masculino' : ($employee->user->gender === 'female' ? 'Femenino' : 'No especificado') }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Fecha de Nacimiento: <em class="text-gray-800 font-medium not-italic">{{ $employee->user->birth_date ? $employee->user->birth_date->format('d M Y') : 'No especificada' }}</em></h3>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Contacto</h2>
                        <h3 class=" text-gray-600 mb-2">Correo Electrónico: <em class="text-gray-800 font-medium not-italic">{{ $employee->user->email }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Teléfono: <em class="text-gray-800 font-medium not-italic">{{ $employee->user->phone_number }}</em> </h3>
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
            </x-tab>
    </div>
</x-admin-layout>
