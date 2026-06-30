<x-admin-layout titleWindow="Gestión de Usuarios" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Usuarios', ],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Gestionar Usuarios</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Consulta, crea y administra los usuarios que tienen acceso al sistema, puedes asignar roles y gestionar su información
                    para mantener un control adecuado sobre quién puede acceder y administrar el sistema DSAC.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <x-ts-button href="{{ route('admin.users.create') }}" text="Nuevo Usuario" icon="plus" sm/>
        <div class="mt-6">
            {{-- table --}}
            @livewire('admin.user-table')
        </div>
    </div>
</x-admin-layout>
