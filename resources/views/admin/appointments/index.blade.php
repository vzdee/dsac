<x-admin-layout titleWindow="Gestión de Citas" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')], 
    ['name' => 'Citas']]">

    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Gestionar Citas</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Aquí puedes gestionar todas las citas de la aplicación. Puedes crear, editar y eliminar citas según sea necesario.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <x-ts-button href="{{ route('admin.appointments.create') }}" text="Nueva Cita" icon="plus" sm />
        <div class="mt-6">
            {{-- table --}}
            @livewire('admin.appointment-table')
        </div>
    </div>
</x-admin-layout>