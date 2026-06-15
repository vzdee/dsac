<x-admin-layout titleWindow="Actualizar Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes', 'href' => route('admin.clients.index')],
    ['name' => 'Actualizar Cliente'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.clients.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a clientes" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Actualizar Cliente</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes actualizar la información del cliente, incluyendo sus datos generales, información fiscal, historial de citas y documentos relacionados. Asegúrate de revisar cada sección cuidadosamente para mantener la información del cliente actualizada y precisa.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="border border-gray-200 rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $client->user->profile_photo_url }}" alt="{{ $client->user->name }}" class="h-20 w-20 rounded-full object-cover object-center">
                        <div>
                            <span class="text-xl font-medium text-gray-800">{{ $client->user->name . ' ' . $client->user->last_name }}</span>
                            <p class="ms2 text-sm text-gray-500">{{ $client->user->email }}</p>
                        </div>
                    </div>
                    <div>
                        <x-ts-button text="Guardar Cambios" type="submit" icon="check" color="indigo" sm/>
                    </div>
                </div>
            </div>

            <x-tab :active="$defaultTab">
                {{-- tab links --}}
                <x-slot name="header">
                    <x-tab-link tab="general-data">
                        <i class="fa-solid fa-user me-2"></i>
                        Datos Generales
                    </x-tab-link>

                    <x-tab-link tab="fiscal-data" :error="$errors->hasAny($errorGroups['fiscal-data'])">
                        <i class="fa-solid fa-file-invoice me-2"></i>
                        Datos Fiscales
                    </x-tab-link>

                    <x-tab-link tab="documents">
                        <i class="fa-solid fa-folder-open me-2"></i>
                        Documentos
                    </x-tab-link>
                </x-slot>
                {{-- tab content --}}
                {{-- general data --}}
                <x-tab-content tab="general-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Información vinculada al usuario</h2>
                                <p class="mt-1 text-sm text-gray-500">Si deseas modificar nombre, correo o teléfono, edita directamente el usuario asociado.</p>
                            </div>
                            <x-ts-button href="{{ route('admin.users.edit', $client->user->id) }}" color="indigo"  outline sm>
                                <i class="fa-solid fa-up-right-from-square mr-1"></i>
                                Editar usuario
                            </x-ts-button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Información Personal</h2>
                        <h3 class="text-gray-600 mb-2">ID Usuario: <em class="text-gray-800 font-medium not-italic">{{ $client->user->id }}</em> </h3>
                        <h3 class="text-gray-600 mb-2">Nombre Completo: <em class="text-gray-800 font-medium not-italic">{{ $client->user->name . ' ' . $client->user->last_name }} </em> </h3>
                        <h3 class="text-gray-600 mb-2">Género: <em 
                            class="text-gray-800 font-medium not-italic">{{ $client->user->gender === 'male' ? 'Masculino' : ($client->user->gender === 'female' ? 'Femenino' : 'No especificado') }}</em> </h3>
                        <h3 class="text-gray-600 mb-2">Fecha de Nacimiento: <em class="text-gray-800 font-medium not-italic">{{ $client->user->birth_date ? $client->user->birth_date->format('d/m/Y') : 'No especificada' }}</em> </h3>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Información De Contacto</h2>
                        <h3 class=" text-gray-600 mb-2">Correo Electrónico: <em class="text-gray-800 font-medium not-italic">{{ $client->user->email }}</em> </h3>
                        <h3 class=" text-gray-600 mb-2">Teléfono: <em class="text-gray-800 font-medium not-italic">{{ $client->user->phone_number }}</em> </h3>
                    </div>
                </x-tab-content>
                
                {{-- fiscal data --}}
                <x-tab-content tab="fiscal-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Información vinculada al cliente</h2>
                            <p class="mt-1 text-sm text-gray-500"><span class="text-red-500">*</span> Esta información es necesaria para la emisión de facturas y otros documentos fiscales, asi para mantener registros actualizados.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 border border-gray-200 bg-white p-5 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Domiciliarios</h2>
                        <x-ts-input label="Dirección *" name="address" :value="old('address', $client->address)" placeholder="Dirección" maxlength="255" autocomplete="street-address" required/>
                        <x-ts-input label="Código Postal *" name="postal_code" :value="old('postal_code', $client->postal_code)" placeholder="Código Postal" x-mask="99999" inputmode="numeric" autocomplete="postal-code" required/>
                        <x-ts-select.styled label="Estado *" name="state" placeholder="Elige una opción" :value="old('state', $client->state)" :options="$states" searchable required />
                        <x-ts-input label="Ciudad o Municipio *" name="municipality" :value="old('municipality', $client->municipality)" maxlength="50" placeholder="Ciudad o Municipio" required />
                    </div>
                    <div class="flex flex-col gap-4 border border-gray-200 bg-white p-5 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Fiscales</h2>
                        <x-ts-input label="Constancia de Situación Fiscal *" name="rfc" :value="old('rfc', $client->rfc)" placeholder="RFC" maxlength="13" class="uppercase" required />
                        <x-ts-input label="CURP *" name="curp" :value="old('curp', $client->curp)" placeholder="CURP" maxlength="18" class="uppercase" required />
                        <x-ts-input label="Razón Social *" name="social_reason" :value="old('social_reason', $client->social_reason)" placeholder="Razón Social" maxlength="255" required />
                        <x-ts-select.styled label="Régimen Fiscal *" name="fiscal_regime" :value="old('fiscal_regime', $client->fiscal_regime)" placeholder="Régimen Fiscal" :options="$regime" searchable required />
                    </div>
                </x-tab-content>
                
                {{-- documents --}}
                <x-tab-content tab="documents">
                </x-tab-content>
            </x-tab>
        </form>
    </div>

</x-admin-layout>
