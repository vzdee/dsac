<x-app-layout titleWindow="Panel">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Saludo y Acciones Rápidas -->
            <div class="flex flex-col md:flex-row justify-between items-center bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">¡Hola, {{ Auth::user()->name ?? 'Cliente' }}!</h2>
                    <p class="text-gray-600 mt-1">Aquí tienes un resumen de tu actividad reciente.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-150 ease-in-out">
                        + Agendar Nueva Cita
                    </button>
                </div>
            </div>

            <!-- Grid de Resumen (Widgets) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Widget Citas Pendientes -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Citas Pendientes</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $pendingAppointmentsCount ?? 0 }}</p>
                    </div>
                </div>

                <!-- Widget Servicios Activos -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Saldo Pendiente</p>
                        <p class="text-2xl font-bold text-gray-800">$100</p>
                    </div>
                </div>

                <!-- Widget Documentos -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Documentos Pendientes</p>
                        <p class="text-2xl font-bold text-gray-800">3</p>
                    </div>
                </div>
            </div>

            <!-- Contenido Principal (Próxima Cita y Calendario) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Próxima Cita -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-blue-500">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Próximas Citas</h3>
                        
                        @forelse($upcomingAppointments as $cita)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    @if($cita->status === 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendiente</span>
                                    @else
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Confirmada</span>
                                    @endif
                                    <span class="text-sm text-gray-500">{{ $cita->scheduled_at->diffForHumans() }}</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg">{{ $cita->service ? $cita->service->name : 'Cita Programada' }}</h4>
                                <p class="text-sm text-gray-600 flex items-center mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $cita->scheduled_at->format('d M, h:i A') }}
                                </p>
                                <p class="text-sm text-gray-600 flex items-center mt-1">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    {{ $cita->employee && $cita->employee->user ? $cita->employee->user->name : 'C.P. Asignado' }}
                                </p>
                                
                                <div class="mt-4 flex space-x-2">
                                    <button class="w-full bg-white text-gray-700 text-sm border border-gray-300 font-semibold py-2 px-3 rounded shadow-sm hover:bg-gray-50 transition">
                                        Reprogramar
                                    </button>
                                    <button class="w-full bg-white text-red-600 text-sm border border-gray-300 font-semibold py-2 px-3 rounded shadow-sm hover:bg-gray-50 transition">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-6">
                                <p class="text-gray-500 text-sm mb-2">No tienes próximas citas agendadas.</p>
                                <button class="text-blue-600 font-semibold text-sm hover:underline">+ Agendar cita ahora</button>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Calendario -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 h-full min-h-[400px] flex flex-col">
                        <!-- Contenedor del Calendario -->
                        <div id="calendar" class="w-full flex-1 min-h-[400px]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
