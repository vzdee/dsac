<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <div class="xl:col-span-1">
        <div class="xl:sticky xl:top-6 rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
            <div class="bg-gray-50 border-b border-gray-200 px-5 py-4">
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-[#B0393F]/10 text-[#B0393F]">
                        <i class="fa-regular fa-calendar-check text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="font-semibold text-gray-900">Resumen de la Cita</h2>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Recuerda confirmar los datos de la cita antes
                            de programar la cita.</p>
                    </div>
                </div>
            </div>

            <div class="p-5 space-y-4">
                <form wire:submit="save" class="space-y-6">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-4">
                        <span class="text-sm font-medium text-gray-500 sm:font-normal">Cliente:</span>
                        <div class="w-full sm:w-64 flex-shrink-0">
                            <x-ts-select.styled placeholder="Selecciona un cliente" :options="$clients"
                                wire:model.live="client" searchable />
                        </div>
                    </div>

                    <div
                        class="flex justify-between items-center gap-4 border-b border-gray-50 pb-2 sm:border-0 sm:pb-0">
                        <span class="text-sm text-gray-500">Empleado:</span>
                        <span
                            class="font-medium text-gray-900">{{ $employee ? collect($employees)->firstWhere('id', $employee)->user->name . ' ' . collect($employees)->firstWhere('id', $employee)->user->last_name : '--' }}</span>
                    </div>

                    <div
                        class="flex justify-between items-center gap-4 border-b border-gray-50 pb-2 sm:border-0 sm:pb-0">
                        <span class="text-sm text-gray-500">Fecha:</span>
                        <span
                            class="font-medium text-gray-900">{{ $searchDate ? \Carbon\Carbon::parse($searchDate)->translatedFormat('d M Y') : '--' }}</span>
                    </div>

                    <div
                        class="flex justify-between items-center gap-4 border-b border-gray-50 pb-2 sm:border-0 sm:pb-0">
                        <span class="text-sm text-gray-500">Hora:</span>
                        <span class="font-medium text-gray-900">{{ $time ?? '--' }}</span>
                    </div>

                    <div
                        class="flex justify-between items-center gap-4 border-b border-gray-50 pb-2 sm:border-0 sm:pb-0">
                        <span class="text-sm text-gray-500">Estado de la Cita:</span>
                        <span
                            class="font-medium text-gray-900">{{ collect($appointmentStatusesOptions)->firstWhere('value', $appointmentStatus)['label'] ?? '--' }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-4">
                        <span class="text-sm font-medium text-gray-500 sm:font-normal">Tipo de Servicio:</span>
                        <div class="w-full sm:w-64 flex-shrink-0">
                            <x-ts-select.styled placeholder="Selecciona un servicio" wire:model.live="service"
                                :options="$services" searchable />
                        </div>
                    </div>

                    <div class="flex justify-between items-center gap-4">
                        <span class="text-sm text-gray-500">Método de pago:</span>
                        <span
                            class="font-medium text-gray-900">{{ collect($paymentMethodsOptions)->firstWhere('value', $paymentMethod)['label'] ?? '--' }}</span>
                    </div>

                    <div class="flex justify-between items-center gap-4">
                        <span class="text-sm text-gray-500">Estado del pago:</span>
                        <span
                            class="font-medium text-gray-900">{{ collect($paymentStatusesOptions)->firstWhere('value', $paymentStatus)['label'] ?? '--' }}</span>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Total a pagar:</span>
                            <span class="text-xl sm:text-2xl font-bold text-[#B0393F]">$ {{ $price ?? 0 }} MXN</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-8">
                        <div class="w-full">
                            <x-ts-textarea label="Notas Adicionales"
                                placeholder="Opcional: agrega información relevante para esta cita"
                                wire:model.live="notes" maxlength="255" count />
                        </div>
                    </div>

                    <div class="flex border-t border-gray-200 pt-6">
                        <x-ts-button type="submit" text="Programar Cita" icon="plus" color="primary"
                            class="w-full justify-center" md />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="xl:col-span-2">

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 bg-gray-50/50 px-5 py-4 sm:px-6 sm:py-5">
                <div class="flex items-center gap-3">
                    <div
                        class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-[#B0393F]/10 text-[#B0393F]">
                        <i class="fa-regular fa-calendar text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-xl font-semibold text-gray-900">Buscar Disponibilidad</h1>
                        <p class="mt-0.5 text-xs sm:text-sm text-gray-500">Asigna a un empleado que tenga disponibilidad
                            de horario para la cita.</p>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <x-ts-date label="Fecha de Cita *" placeholder="Elige una fecha de cita" min-date="today"
                        format="DD MMMM YYYY" wire:model.live="searchDate" weekdays />

                    <x-ts-select.styled label="Estado de la Cita *" placeholder="Selecciona un estado para la cita"
                        wire:model.live="appointmentStatus" :options="$appointmentStatusesOptions" />
                </div>

                <div class="grid grid-cols-1 gap-4 pt-2">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <h3 class="text-base sm:text-lg font-medium text-gray-800">Empleados Disponibles:</h3>
                        <div class="flex flex-col sm:items-end">
                            @error('employee')
                                <span class="text-sm font-medium text-red-500">{{ $message }}</span>
                            @enderror
                            @error('time')
                                <span class="text-sm font-medium text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if ($searchDate)
                        @forelse($employees as $emp)
                            <div class="rounded-xl border border-gray-200 bg-white p-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#B0393F]/10 text-[#B0393F]">
                                        <i class="fa-regular fa-user text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $emp->user->name }}
                                            {{ $emp->user->last_name }}</h4>
                                        <p class="text-sm text-gray-500">Contador Fiscal</p>
                                    </div>
                                </div>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach ($timeSlots as $slot)
                                        @php
                                            $isBooked =
                                                isset($bookedSlots[$emp->id]) &&
                                                in_array($slot, $bookedSlots[$emp->id]);

                                            $isPast = false;
                                            if ($searchDate) {
                                                $selectedDate = \Carbon\Carbon::parse($searchDate)->startOfDay();
                                                if ($selectedDate->isToday()) {
                                                    $slotTime = \Carbon\Carbon::createFromFormat('H:i', $slot);
                                                    if (now()->greaterThanOrEqualTo($slotTime)) {
                                                        $isPast = true;
                                                        if ($appointmentId && $employee == $emp->id && $time == $slot) {
                                                            $isPast = false;
                                                        }
                                                    }
                                                }
                                            }

                                            $isDisabled = $isBooked || $isPast;
                                        @endphp
                                        <button type="button"
                                            @if (!$isDisabled) wire:click="selectTime({{ $emp->id }}, '{{ $slot }}')" @endif
                                            @disabled($isDisabled) @class([
                                                'rounded-lg border px-4 py-2 text-sm transition focus:outline-none focus:ring-2 focus:ring-[#B0393F]/20',
                                                'border-[#B0393F] bg-[#B0393F] text-white' =>
                                                    $employee == $emp->id && $time == $slot && $date == $searchDate,
                                                'border-gray-200 hover:border-[#B0393F] hover:text-[#B0393F] cursor-pointer' =>
                                                    !($employee == $emp->id && $time == $slot && $date == $searchDate) &&
                                                    !$isDisabled,
                                                'bg-gray-100 text-gray-400 border-gray-100 cursor-not-allowed opacity-70' => $isDisabled,
                                            ])>
                                            {{ $slot }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No hay empleados registrados.</p>
                        @endforelse
                    @else
                        <div
                            class="rounded-xl border border-dashed border-gray-300 bg-gray-50 p-8 text-center col-span-1">
                            <div class="flex justify-center text-gray-400 mb-3">
                                <i class="fa-regular fa-calendar-days text-3xl"></i>
                            </div>
                            <h3 class="text-sm font-medium text-gray-900">No se ha seleccionado fecha</h3>
                            <p class="mt-1 text-sm text-gray-500">Selecciona una fecha de cita para ver la
                                disponibilidad de horarios de los contadores.</p>
                        </div>
                    @endif
                </div>

                <div class="flex items-center p-4 gap-3 rounded-lg bg-gray-50 border border-gray-200">
                    <i class="fa-solid fa-circle-info text-gray-400 mt-0.5 flex-shrink-0"></i>
                    <span class="text-xs sm:text-sm text-gray-600 leading-relaxed">Recuerda que si necesitas actualizar
                        el estado, puedes ir a Editar Cita, ahi podrás modificar el estado de la cita, su posible fecha
                        programada o alguna opción específica que necesites.</span>
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm mt-4">
            <div class="border-b border-gray-200 bg-gray-50/50 px-5 py-4 sm:px-6 sm:py-5">
                <div class="flex items-center gap-3">
                    <div
                        class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-[#B0393F]/10 text-[#B0393F]">
                        <i class="fa-regular fa-credit-card text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-xl font-semibold text-gray-900">Información de pago</h1>
                        <p class="mt-0.5 text-xs sm:text-sm text-gray-500">Completa la información acerca de cómo el
                            cliente va a realizar su pago.</p>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <x-ts-select.styled label="Método de Pago *" placeholder="Selecciona un método"
                        wire:model.live="paymentMethod" :options="$paymentMethodsOptions" />
                    <x-ts-select.styled label="Estado del Pago *" placeholder="Selecciona un estado"
                        wire:model.live="paymentStatus" :options="$paymentStatusesOptions" />
                </div>
            </div>
        </div>
    </div>
</div>
