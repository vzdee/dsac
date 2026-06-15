<x-admin-layout titleWindow="Gestión de Empleados" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Empleados', ],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Gestionar Empleados</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Consulta, crea y administra los empleados que tienen acceso al sistema, puedes asignar roles y gestionar su información
                    para mantener un control adecuado sobre quién puede acceder y administrar el sistema DSAC.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <x-ts-button href="{{ route('admin.employees.create') }}" text="Crear Empleado" icon="plus" sm/>
        <div class="mt-6">
            {{-- table --}}
            @livewire('admin.employee-table')
        </div>
    </div>
</x-admin-layout>
