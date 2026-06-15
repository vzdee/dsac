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
                <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-4">
                    <h2 class="text-2xl font-medium text-gray-800 mb-2">Información General</h2>
                    <p class="text-sm text-gray-500 mb-4"><span class="text-red-500">*</span> Proporciona la información general del usuario, incluyendo su nombre completo, género y fecha de nacimiento.</p>
                </div>
                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800">Datos Personales</h2>
                        <p class="text-sm text-gray-500">Proporciona la información personal del usuario.</p>
                    </div>
                    <x-ts-input label="Nombre(s) *" name="name" placeholder="Juan Carlos" maxlength="50" :value="old('name', $user->name)" required/>
                    <x-ts-input label="Apellido(s) *" name="last_name" placeholder="Ej: Pérez García" maxlength="50" :value="old('last_name', $user->last_name)" required/>
                    <x-ts-select.styled label="Género *" name="gender" placeholder="Elige una opción"
                    :options="[['value' => 'male', 'label' => 'Masculino'], ['value' => 'female', 'label' => 'Femenino']]" :value="old('gender', $user->gender)"  required />
                    <x-ts-date label="Fecha de Nacimiento *" name="birth_date" format="DD/MM/YYYY" placeholder="Ej: 26/03/2003" 
                    :min-date="now()->subYears(90)->format('Y-m-d')" :max-date="now()->subYears(18)->format('Y-m-d')" :value="old('birth_date', $user->birth_date)" required/>
                </div>
                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800">Información de Contacto</h2>
                        <p class="text-sm text-gray-500">Proporciona la información de contacto del usuario para mantener una comunicación efectiva.</p>
                    </div>    
                    <x-ts-input label="Correo Electrónico *" name="email" placeholder="Ej: user@example.com" maxlength="100" :value="old('email', $user->email)" required/>
                    <x-ts-input label="Número de Teléfono *" name="phone_number" placeholder="Ej: (123) 456-7890" x-mask="(999) 999 9999" :value="old('phone_number', $user->phone_number)" required/>

                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información de Acceso</h2>
                        <p class="text-sm text-gray-500">Establece las credenciales de acceso para el usuario.</p>
                    </div>
                    <x-ts-password label="Contraseña *" name="password" placeholder="Al menos 8 carácteres" />
                    <x-ts-password label="Confirmar Contraseña *" name="password_confirmation" placeholder="Confirma tu contraseña" />
                </div>
                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl mt-4 font-medium text-gray-800 ">Role de usuario</h2>
                        <p class="text-sm text-gray-500">Asigna un rol al usuario para definir sus permisos y nivel de acceso dentro del sistema.</p>
                    </div>
                    <x-ts-select.styled label="Rol de usuario *" name="role_id" :value="old('role_id', $user->roles->first()?->id)" placeholder="Elige un rol para el usuario" :options="$roles" hint="Recuerda tener cuidado con la actualización de roles, cualquier cambio puede afectar significativamente la funcionalidad del sistema." />
                </div>
            </div>
            <div class="mt-6">
                <x-ts-button type="submit" text="Actualizar Usuario" class="w-full justify-center md:w-auto" color="indigo" icon="check" sm />
            </div>
        </form>
    </div>
</x-admin-layout>