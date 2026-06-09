<x-admin-layout titleWindow="Gestión de Clientes" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Gestionar Clientes</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Administra los clientes registrados en el sistema, edita su información y gestiona la información
                    visible.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <x-ts-button href="{{ route('admin.clients.create') }}" text="Crear Cliente" icon="plus" sm/>
        <div class="mt-4">
            @livewire('admin.client-table')
        </div>
    </div>

</x-admin-layout>
