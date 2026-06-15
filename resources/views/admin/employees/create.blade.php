<x-admin-layout titleWindow="Crear Empleado" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Empleados', 'href' => route('admin.employees.index')],
    ['name' => 'Crear Empleado'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.users.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a usuarios" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Crear Empleados</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Proporciona la información necesaria para registrar un nuevo empleado en el sistema, incluyendo sus datos personales, de contacto y credenciales de acceso para garantizar un acceso seguro al sistema DSAC.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <form action="{{ route('admin.employees.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información Personal</h2>
                        <p class="text-sm text-gray-500">Proporciona la información personal del empleado para su registro.</p>
                    </div>
                    <x-ts-input label="Nombre(s) *" name="name" placeholder="Ej: Juan Carlos" :value="old('name')"  maxlength="50" autofocus required />
                    <x-ts-input label="Apellido(s) *" placeholder="Ej: Pérez García" name="last_name" :value="old('last_name')" maxlength="50" required />

                    <x-ts-select.styled label="Género *" name="gender" placeholder="Selecciona una opción" :options="[
                        ['value' => 'male', 'label' => 'Masculino'], 
                        ['value' => 'female', 'label' => 'Femenino']]" :value="old('gender')" required />
                    <x-ts-date label="Fecha de Nacimiento *" name="birth_date" placeholder="Ej: 26/03/2003" format="DD/MM/YYYY"
                        :min-date="now()->subYears(90)->format('Y-m-d')" 
                        :max-date="now()->subYears(18)->format('Y-m-d')" :value="old('birth_date')" required />
                </div>

                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información de Contacto</h2>
                        <p class="text-sm text-gray-500">Proporciona los datos de contacto del empleado.</p>
                    </div>
                    <x-ts-input label="Correo Electrónico *" placeholder="Ej: user@example.com" name="email" :value="old('email')" required />
                    <x-ts-input label="Número de Teléfono *" placeholder="Ej: (999) 999 9999" x-mask="(999) 999 9999" name="phone_number" :value="old('phone_number')" required />
                </div>

                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información de Acceso</h2>
                        <p class="text-sm text-gray-500">Establece las credenciales de acceso para el usuario.</p>
                    </div>
                    <x-ts-password label="Contraseña *" placeholder="Al menos 8 carácteres" name="password" required />
                    <x-ts-password label="Confirmar Contraseña *" placeholder="Confirma tu contraseña" name="password_confirmation" required />
                </div>
            </div>
            <div class="mt-6">
                <x-ts-button type="submit" text="Crear Empleado" class="w-full justify-center md:w-auto" color="indigo" icon="plus" sm />
            </div>
        </form>
    </div>
</x-admin-layout>
