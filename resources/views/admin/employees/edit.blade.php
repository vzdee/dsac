<x-admin-layout titleWindow="Editar Empleado" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Empleados', 'href' => route('admin.employees.index')],
    ['name' => 'Editar Empleado']
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Editar Empleado</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">
                    Modifica la información del empleado, actualiza sus datos personales, de contacto o credenciales de acceso para mantener su perfil actualizado y garantizar un acceso seguro al sistema DSAC.
                </p>
            </div>
        </div>
    </x-slot>
    <div>
        <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="border border-gray-200 rounded-lg p-4 mb-6">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center gap-4">
                    <img src="{{ $employee->user->profile_photo_url }}" alt="{{ $employee->user->name }}" class="h-20 w-20 rounded-full object-cover object-center">
                    <div>
                        <span class="text-xl font-medium text-gray-800">{{ $employee->user->name . ' ' . $employee->user->last_name }}</span>
                        <p class="ms2 text-sm text-gray-500">{{ $employee->user->email }}</p>
                    </div>
                </div>
                <div>
                    <x-ts-button text="Guardar Cambios" type="submit" icon="check" color="indigo" sm/>
                </div>
            </div>
        </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información Personal</h2>
                        <p class="text-sm text-gray-500">Puedes actualizar la información personal del empleado anteriormente proporcionados en caso de ser necesario.</p>
                    </div>
                    <x-ts-input label="Nombre(s) *" name="name" placeholder="Ej: Juan Carlos" :value="old('name', $employee->user->name)"  maxlength="50" autofocus required />
                    <x-ts-input label="Apellido(s) *" placeholder="Ej: Pérez García" name="last_name" :value="old('last_name', $employee->user->last_name)" maxlength="50" required />

                    <x-ts-select.styled label="Género *" name="gender" placeholder="Selecciona una opción" :options="[
                        ['value' => 'male', 'label' => 'Masculino'], 
                        ['value' => 'female', 'label' => 'Femenino']]" :value="old('gender', $employee->user->gender)" required />
                    <x-ts-date label="Fecha de Nacimiento *" name="birth_date" placeholder="Ej: 26/03/2003" format="DD/MM/YYYY"
                        :min-date="now()->subYears(90)->format('Y-m-d')" 
                        :max-date="now()->subYears(18)->format('Y-m-d')" :value="old('birth_date', $employee->user->birth_date)" required />
                </div>

                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información de Contacto</h2>
                        <p class="text-sm text-gray-500">Puedes actualizar los datos de contacto del empleado anteriormente proporcionados en caso de ser necesario.</p>
                    </div>
                    <x-ts-input label="Correo Electrónico *" placeholder="Ej: user@example.com" name="email" :value="old('email', $employee->user->email)" required />
                    <x-ts-input label="Número de Teléfono *" placeholder="Ej: (999) 999 9999" x-mask="(999) 999 9999" name="phone_number" :value="old('phone_number', $employee->user->phone_number)" required />
                </div>

                <div class="flex flex-col gap-3 border border-gray-200 bg-white p-5 shadow-sm rounded-lg">
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mt-5">Información de Acceso</h2>
                        <p class="text-sm text-gray-500">Puedes actualizar las credenciales de acceso para el usuario en caso de ser necesario. <span class="font-medium">En caso de NO DESEAR CAMBIAR LA CONTRASEÑA, deja los campos en vacíos.</span></p>
                    </div>
                    <x-ts-password label="Contraseña *" placeholder="Al menos 8 carácteres" name="password" />
                    <x-ts-password label="Confirmar Contraseña *" placeholder="Confirma tu contraseña" name="password_confirmation" />
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
