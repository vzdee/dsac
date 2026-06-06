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
                    Bienvenido al panel de administración de DSAC. Desde aquí podrás gestionar usuarios, clientes,
                    servicios y citas para mantener tu sistema organizado y eficiente.
                </p>
            </div>
        </div>
    </x-slot>

</x-admin-layout>
