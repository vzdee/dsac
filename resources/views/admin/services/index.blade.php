<x-admin-layout titleWindow="Panel Administrador" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Servicios', ],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Gestionar Servicios</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Registra un nuevo servicio fiscal o contable para mantener actualizado el catálogo
                    disponible dentro del sistema.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <x-ts-button href="{{ route('admin.services.create') }}" text="Crear Servicio" icon="plus" sm/>
        <div>
            {{-- table --}}
            
        </div>
    </div>
</x-admin-layout>
