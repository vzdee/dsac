<x-admin-layout titleWindow="Crear Usuarios" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Usuarios', 'href' => route('admin.users.index')],
    ['name' => 'Crear Usuario'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.users.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a usuarios" icon="arrow-left" />

            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Crear Nuevo Usuario</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Registra un nuevo usuario para que pueda acceder al sistema, asigna un rol adecuado y completa su información de contacto para mantener un control adecuado sobre quién puede acceder y administrar el sistema DSAC.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <x-ts-input label="Nombre(s) *" name="name" placeholder="Ej: Juan Carlos" maxlength="50" :value="old('name')" required/>
                </div>
                <div>
                    <x-ts-input label="Apellido(s) *" name="last_name" placeholder="Ej: Pérez García" maxlength="50" :value="old('last_name')" required/>
                </div>
                <div>
                    <x-ts-input label="Correo Electrónico *" name="email" placeholder="Ej: user@example.com" maxlength="100" :value="old('email')" required/>
                </div>
                <div>
                    <x-ts-input label="Número de Teléfono *" name="phone_number" placeholder="Ej: (123) 456-7890" x-mask="(999) 999 9999" :value="old('phone_number')" required/>
                </div>
                <div>
                    <x-ts-password label="Contraseña *" name="password" placeholder="Al menos 8 carácteres" required />
                </div>
                <div>
                    <x-ts-password label="Confirmar Contraseña *" name="password_confirmation" placeholder="Confirma tu contraseña" required />
                </div>
                <div>
                    <x-ts-select.styled label="Role de usuario *" name="role_id" :value="old('role_id')" placeholder="Elige un rol para el usuario" hint="" :options="$roles" required  />
                </div>
            </div>
            <div class="mt-6">
                <x-ts-button type="submit" text="Crear Usuario" class="w-full justify-center md:w-auto" color="indigo" icon="plus" sm />
            </div>
        </form>
    </div>

</x-admin-layout>