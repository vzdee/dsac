<x-admin-layout titleWindow="Crear Cita" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Citas', 'href' => route('admin.appointments.index')],
    ['name' => 'Crear Cita']
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.appointments.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a Citas" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Crear Cita</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes crear una nueva cita para la aplicación. Completa el formulario a continuación para agregar una nueva cita.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        @livewire('admin.appointment-form')
    </div>



</x-admin-layout>