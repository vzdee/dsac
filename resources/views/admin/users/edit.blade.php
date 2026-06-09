<x-admin-layout titleWindow="Actualizar Usuario" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Usuarios', 'href' => route('admin.users.index')],
    ['name' => 'Editar Usuario'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.users.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a usuarios" icon="arrow-left" />

            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Editar Usuario</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Modifica la información del usuario, actualiza su rol o ajusta sus datos de contacto según sea necesario para mantener la información del sistema DSAC precisa y actualizada.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <x-ts-input label="Nombre(s) *" name="name" placeholder="Juan Carlos" maxlength="50" :value="old('name', $user->name)" required/>
                </div>
                <div>
                    <x-ts-input label="Apellido(s) *" name="last_name" placeholder="Ej: Pérez García" maxlength="50" :value="old('last_name', $user->last_name)" required/>
                </div>
                <div>
                    <x-ts-input label="Correo Electrónico *" name="email" placeholder="Ej: user@example.com" maxlength="100" :value="old('email', $user->email)" required/>
                </div>
                <div>
                    <x-ts-input label="Número de Teléfono *" name="phone_number" placeholder="Ej: (123) 456-7890" x-mask="(999) 999 9999" :value="old('phone_number', $user->phone_number)" required/>
                </div>
                <div>
                    <x-ts-password label="Contraseña *" name="password" placeholder="Al menos 8 carácteres" />
                </div>
                <div>
                    <x-ts-password label="Confirmar Contraseña *" name="password_confirmation" placeholder="Confirma tu contraseña" />
                </div>
                <div class="lg:col-span-2">
                    <x-ts-select.styled label="Rol de usuario *" name="role_id" :value="old('role_id', $user->roles->first()?->id)" placeholder="Elige un rol para el usuario" :options="$roles" hint="Recuerda tener cuidado con la actualización de roles, cualquier cambio puede afectar significativamente la funcionalidad del sistema." />
                </div>
            </div>
            <div class="mt-6">
                <x-ts-button type="submit" text="Actualizar Usuario" class="w-full justify-center md:w-auto" color="indigo" icon="check" sm />
            </div>
        </form>
    </div>
</x-admin-layout>