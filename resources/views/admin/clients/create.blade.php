<x-admin-layout titleWindow="Actualizar Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes', 'href' => route('admin.clients.index')],
    ['name' => 'Crear Cliente'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Crear Cliente</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">

                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
        </form>
    </div>

</x-admin-layout>
