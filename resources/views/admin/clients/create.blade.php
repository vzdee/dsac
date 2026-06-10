<x-admin-layout titleWindow="Crear Cliente" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Clientes', 'href' => route('admin.clients.index')],
    ['name' => 'Crear Cliente'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.clients.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a clientes" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Crear Cliente</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes registrar un nuevo cliente en el
                    sistema, proporcionando su información general, datos fiscales, historial de citas y documentos
                    relacionados. Asegúrate de completar todos los campos requeridos para mantener la información del
                    cliente precisa y actualizada.
                </p>
            </div>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
            <x-tab :active="$defaultTab">
                {{-- tab links --}}
                <x-slot name="header">
                    <x-tab-link tab="general-data" :error="$errors->hasAny($errorGroups['general-data'])">
                        <i class="fa-solid fa-user me-2"></i>
                        Datos Generales
                    </x-tab-link>

                    <x-tab-link tab="fiscal-data" :error="$errors->hasAny($errorGroups['fiscal-data'])">
                        <i class="fa-solid fa-file-invoice me-2"></i>
                        Datos Fiscales
                    </x-tab-link>
                </x-slot>

                {{-- tab content --}}
                {{-- general data --}}
                <x-tab-content tab="general-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Información vinculada al usuario</h2>
                                <p class="mt-1 text-sm text-gray-500">Si deseas modificar nombre, correo o teléfono,
                                    edita directamente el usuario asociado.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-ts-input label="Nombre(s) *" name="name" placeholder="Ej: Juan Carlos" maxlength="50"
                            :value="old('name')" autofocus required />
                    </div>
                    <div>
                        <x-ts-input label="Apellido(s) *" name="last_name" placeholder="Ej: Pérez García" maxlength="50"
                            :value="old('last_name')" required />
                    </div>
                    <div>
                        <x-ts-input label="Correo Electrónico *" name="email" placeholder="Ej: user@example.com"
                            maxlength="100" :value="old('email')" required />
                    </div>
                    <div>
                        <x-ts-input label="Número de Teléfono *" name="phone_number" placeholder="Ej: (123) 456-7890"
                            x-mask="(999) 999 9999" :value="old('phone_number')" required />
                    </div>
                    <div>
                        <x-ts-password label="Contraseña *" name="password" placeholder="Al menos 8 carácteres"
                            required />
                    </div>
                    <div>
                        <x-ts-password label="Confirmar Contraseña *" name="password_confirmation"
                            placeholder="Confirma tu contraseña" required />
                    </div>
                </x-tab-content>

                {{-- fiscal data --}}
                <x-tab-content tab="fiscal-data">
                    <div class="lg:col-span-2 rounded-xl border border-gray-200 bg-gray-100 p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Información vinculada al cliente</h2>
                                <p class="mt-1 text-sm text-gray-500"><span class="text-red-500">*</span> Esta
                                    información es necesaria para la emisión de facturas y otros documentos fiscales,
                                    asi para mantener registros actualizados.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Dirección</h2>
                        <x-ts-input label="Dirección *" name="address" :value="old('address')" placeholder="Dirección"
                            maxlength="255" autocomplete="street-address" required />
                        <x-ts-input label="Código Postal *" name="postal_code" :value="old('postal_code')"
                            placeholder="Código Postal" x-mask="99999" inputmode="numeric" autocomplete="postal-code" required />
                    </div>
                    <div>
                        <h2 class="text-2xl font-medium text-gray-800 mb-2">Datos Fiscales</h2>
                        <x-ts-input label="Constancia de Situación Fiscal *" name="rfc" :value="old('rfc')"
                            placeholder="RFC" class="uppercase"  maxlength="13"  required />
                        <x-ts-input label="CURP *" name="curp" :value="old('curp')" placeholder="CURP" class="uppercase" maxlength="18"
                            required />
                        <x-ts-input label="Razón Social *" name="social_reason" :value="old('social_reason')"
                            placeholder="Razón Social" maxlength="255" required />
                        <x-ts-input label="Régimen Fiscal *" name="fiscal_regime" :value="old('fiscal_regime')"
                            placeholder="Régimen Fiscal" maxlength="255" required />
                    </div>
                </x-tab-content>
                <div class="mt-6">
                    <x-ts-button type="submit" text="Crear Cliente" icon="plus" color="indigo" sm />
                </div>
            </x-tab>
        </form>
    </div>

</x-admin-layout>
