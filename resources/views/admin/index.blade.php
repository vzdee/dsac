<x-admin-layout titleWindow="Panel Administrador" :breadcrumbs="
[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
]
">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Panel General Administrador</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Bienvend@ de nuevo {{ Auth::user()->name  }}, ¿Qué vamos a gestionar hoy?
                </p>
            </div>
        </div>
    </x-slot>
    <div class="mt-8">

        @role('Administrador')
            @include('components.includes.admin.admin-dashboard')
        @endrole

        @role('Contador')
            @include('components.includes.employee.employee-dashboard')
        @endrole

    </div>
</x-admin-layout>
