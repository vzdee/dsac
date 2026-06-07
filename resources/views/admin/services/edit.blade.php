<x-admin-layout titleWindow="Panel Administrador" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Servicios', 'href' => route('admin.services.index')],
    ['name' => 'Editar Servicio'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.services.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a servicios" icon="arrow-left" />

            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Editar servicio</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Actualiza la información de tu servicio para mantener tu catálogo actualizado y 
                    relevante dentro del sistema, recuerda que los cambios pueden afectar a los clientes que ya han contratado este servicio.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        {{-- forms --}}
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-ts-input name="name" label="Nombre del servicio *" placeholder="Asesoría Fiscal Anual" :value="old('name', $service->name)" autofocus required />
                </div>
                <div>
                    <x-ts-input name="price" label="Precio *" placeholder="1,500" x-mask:dynamic="$money($input)" min="0" :value="old('price', $service->price)"  required>
                        <x-slot:prefix>
                            <span class="text-gray-400 ms-2">$</span>
                        </x-slot:prefix>

                        <x-slot:suffix>
                            <span class="text-xs font-semibold text-gray-400 me-2">MXN</span>
                        </x-slot:suffix>
                    </x-ts-input>
                </div>
                <div>
                    <x-ts-select.styled name="status" label="Estado del Servicio *" placeholder="Elige una opción" :value="old('status', $service->status)"
                    :options="[
                        ['label' => 'Activo', 'value' => 'active'],
                        ['label' => 'Inactivo', 'value' => 'inactive'],
                    ]" required/>
                </div>
                <div>
                    <x-ts-textarea name="description" label="Descripción *"
                        placeholder="Agrega una breve explicación de lo que ofrece este servicio" maxlength="150" :value="old('description', $service->description)"
                        required count />
                </div>
            </div>
            <div class="mt-6">
                <x-ts-button type="submit" text="Actualizar Servicio" class="w-full justify-center md:w-auto" color="indigo" icon="check" sm />
            </div>
        </form>
    </div>
</x-admin-layout>
