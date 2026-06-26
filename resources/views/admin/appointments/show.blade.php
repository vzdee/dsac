<x-admin-layout titleWindow="Detalles Cita" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.index')],
    ['name' => 'Citas', 'href' => route('admin.appointments.index')],
    ['name' => 'Detalles Cita'],
]">
    <x-slot name="head">
        <div class="flex flex-col gap-4">
            <x-ts-button href="{{ route('admin.appointments.index') }}" class="inline-flex w-fit" outline sm
                text="Volver a Citas" icon="arrow-left" />
            <div class="max-w-2xl">
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Detalles de la Cita</h1>
                <p class="mt-2 text-sm leading-6 text-gray-500 sm:text-base">Aquí puedes ver los detalles de la cita, generar un comprobante de pago en formato PDF y visualizar datos necesarios de la cita.
                </p>
            </div>
        </div>
    </x-slot>


    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">
        <div class="p-6 sm:p-8 sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex sm:gap-6 sm:items-center">
                <img src="{{ $appointment->client->user->profile_photo_url }}" alt="{{ $appointment->client->user->name }}" class="h-24 w-24 rounded-full object-cover object-center">
                <div class="mt-4 sm:mt-0 sm:pt-1 text-center sm:text-left">
                    <p class="text-sm font-medium text-gray-500 tracking-wide uppercase">Cita #{{ $appointment->id  ?? 'N/A'}} del Cliente</p>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl mt-1">
                        {{ $appointment->client->user->name ?? 'Cliente' }} {{ $appointment->client->user->last_name ?? '' }}
                    </h1>
                    <p class="text-sm font-medium text-gray-500 mt-2 flex items-center justify-center sm:justify-start">
                        {{ $appointment->scheduled_at ? ucfirst($appointment->scheduled_at->translatedFormat('l, d \d\e F Y \a \l\a\s h:i A')) : 'Fecha pendiente' }}
                    </p>
                </div>
            </div>
            <div class="mt-6 flex flex-col sm:flex-row gap-3 sm:mt-0">
                <x-ts-button href="{{ route('admin.appointments.edit', $appointment->id) }}" target="_blank" color="indigo" class="w-full sm:w-auto" sm outline>
                    <i class="fa-solid fa-up-right-from-square"></i>
                    Editar Cita
                </x-ts-button>
                <x-ts-button href="#" color="red" target="_blank" outline class="w-full sm:w-auto" sm>
                    <i class="fa-solid fa-file-arrow-down"></i>
                    Generar Comprobante
                </x-ts-button>
            </div>
        </div>


        <div class="border-t border-gray-100 bg-gray-50 px-6 sm:px-8 py-5 grid grid-cols-2 sm:grid-cols-4 gap-6 text-sm text-center sm:text-left">
            <div>
                <span class="block text-gray-500 mb-4 text-xs uppercase tracking-wider font-semibold">Estado de Cita</span>
                <span class="block font-medium text-gray-900">
                    @if($appointment->status === 'pending')
                    <span class="bg-yellow-200 text-yellow-800 p-2 rounded text-xs">Pendiente</span>
                    @elseif($appointment->status === 'confirmed')
                    <span class="bg-green-200 text-green-800 p-2 rounded text-xs">Confirmada</span>
                    @elseif($appointment->status === 'completed')
                    <span class="bg-gray-200 text-gray-800 p-2 rounded text-xs">Completada</span>
                    @elseif($appointment->status === 'cancelled')
                    <span class="bg-red-200 text-red-800 p-2 rounded text-xs">Cancelada</span>
                    @else
                    {{ ucfirst($appointment->status ?? 'Desconocido') }}
                    @endif
                </span>
            </div>
            <div>
                <span class="block text-gray-500 mb-4 text-xs uppercase tracking-wider font-semibold">Monto Total a Pagar</span>
                <span class="block font-medium text-gray-900">${{ number_format($appointment->price ?? 0) }} MXN</span>
            </div>
            <div>
                <span class="block text-gray-500 mb-4 text-xs uppercase tracking-wider font-semibold">Estado de Pago</span>
                <span class="block font-medium text-gray-900">
                    @if($appointment->payment_status === 'paid')
                    <span class="bg-green-200 text-green-800 p-2 rounded text-xs">Pagado</span>
                    @elseif($appointment->payment_status === 'pending')
                    <span class="bg-yellow-200 text-yellow-800 p-2 rounded text-xs">Pendiente</span>
                    @elseif($appointment->payment_status === 'refunded')
                    <span class="bg-red-200 text-red-800 p-2 rounded text-xs">Reembolsado</span>
                    @else
                    {{ ucfirst($appointment->payment_status ?? 'No definido') }}
                    @endif
                </span>
            </div>
            <div>
                <span class="block text-gray-500 mb-4 text-xs uppercase tracking-wider font-semibold">Empleado asignado</span>
                <span class="block font-medium text-gray-900">{{ $appointment->employee->user->name . ' ' . $appointment->employee->user->last_name ?? 'No asignado' }}</span>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-100">Información del Cliente</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="sm:col-span-1">
                        <p class="text-sm font-medium text-gray-500 mb-2">Nombre</p>
                        <p class="text-base text-gray-900">
                            {{ $appointment->client->user->name . ' ' .$appointment->client->user->last_name ?? 'Sin datos' }}
                        </p>
                    </div>
                    <div class="sm:col-span-1">
                        <p class="text-sm font-medium text-gray-500 mb-2">Correo Electrónico</p>
                        <p class="text-base text-gray-900">{{ $appointment->client->user->email ?? 'No registrado' }}</p>
                    </div>
                    <div class="sm:col-span-1">
                        <p class="text-sm font-medium text-gray-500 mb-2">Teléfono</p>
                        <p class="text-base text-gray-900">{{ $appointment->client->user->phone_number ?? 'No registrado' }}</p>
                    </div>
                    <div class="sm:col-span-1">
                        <p class="text-sm font-medium text-gray-500 mb-2">Documentos del cliente</p>
                        <div class="text-base text-gray-900">
                            <x-ts-button href="{{ route('admin.clients.show', $appointment->client_id )}}" color="green" target="_blank" outline sm>
                                <i class="fa-regular fa-eye"></i>
                                Ver Documentos
                            </x-ts-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-100">Detalles de la Cita</h3>
                <div class="grid grid-cols-1 gap-x-8 gap-y-6">
                    <div class="sm:col-span-1">
                        <p class="text-sm font-medium text-gray-500 mb-2">Servicio Solicitado</p>
                        <p class="text-base text-gray-900">{{ $appointment->service->name ?? 'No especificado' }}</p>
                    </div>

                    @if($appointment->notes)
                    <div class="sm:col-span-1 pt-2">
                        <p class="text-sm font-medium text-gray-500 mb-2">Notas Adicionales</p>
                        <p class="text-sm text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $appointment->notes }}</p>
                    </div>
                    @else
                    <div class="sm:col-span-1 pt-2">
                        <p class="text-sm font-medium text-gray-500 mb-2">Notas Adicionales</p>
                        <p class="text-sm text-gray-400">No hay notas registradas para esta cita.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 pb-4 border-b border-gray-100">Resumen de Cobro</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-gray-600">Subtotal</span>
                        <span class="text-sm font-medium text-gray-900">${{ number_format($appointment->price ?? 0, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-gray-600">Impuestos (0%)</span>
                        <span class="text-sm font-medium text-gray-900">$0.00</span>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-2">
                        <span class="text-base font-semibold text-gray-900">Total a Pagar</span>
                        <span class="text-xl font-bold text-indigo-600">${{ number_format($appointment->price ?? 0, 2) }}</span>
                    </div>

                    <div class="pt-4 mt-4 border-t border-gray-100">
                        <span class="block text-sm font-medium text-gray-500 mb-1">Método de Pago</span>
                        @if ($appointment->payment_method === 'transfer')
                        <span class="block font-medium text-gray-900 text-sm">Transferencia</span>
                        @elseif ($appointment->payment_method === 'card')
                        <span class="block font-medium text-gray-900 text-sm">Tarjeta</span>
                        @elseif ($appointment->payment_method === 'cash')
                        <span class="block font-medium text-gray-900 text-sm">Efectivo</span>
                        @else
                        <span class="block font-medium text-gray-900 text-sm">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            @if($appointment->payment_status !== 'paid')
            <div class="bg-indigo-50 rounded-2xl border border-blue-100 p-6">
                <p class="text-sm text-blue-600 text-left">
                    Esta cita aún tiene saldo pendiente. Edita la cita para registrar el pago.
                </p>
            </div>
            @endif
        </div>
    </div>

</x-admin-layout>