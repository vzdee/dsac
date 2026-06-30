<div class="mb-10">
    <div class="mb-8">
        <h2 class="text-2xl font-semibold leading-6 text-[#1F1F1F]">Resumen General</h2>
        <p class="mt-2 text-sm text-[#6B6568]">Métricas globales financieras y operativas del negocio.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        
        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-6 transition-all duration-300 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#F9F6F3] text-xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#6B6568]">Citas totales del mes</p>
                    <p class="text-3xl font-bold text-[#1F1F1F]">{{ $totalAppointmentsMonth }}</p>
                </div>
            </div>
            <div class="mt-4 border-t border-[#E4DFDC] pt-4">
                <a href="#" class="flex items-center text-sm font-medium text-[#B0393F] hover:text-[#8a2a30] transition-colors">
                    Descargar reporte
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>

        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-6 transition-all duration-300 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#F9F6F3] text-xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                    <i class="fa-solid fa-calendar-day"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#6B6568]">Citas Totales</p>
                    <p class="text-3xl font-bold text-[#1F1F1F]">{{ $totalAppointmentsToday }}</p>
                </div>
            </div>
            <div class="mt-4 border-t border-[#E4DFDC] pt-4 flex items-center justify-between">
                <span class="text-xs font-medium text-[#6B6568]">Hoy</span>
            </div>
        </div>

        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-6 transition-all duration-300 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#F9F6F3] text-xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#6B6568]">Ingresos (Servicios completados)</p>
                    <p class="text-3xl font-bold text-[#1F1F1F]">${{ number_format($revenueCompletedMonth) }}</p>
                </div>
            </div>
            <div class="mt-4 border-t border-[#E4DFDC] pt-4 flex items-center justify-between">
                <span class="text-xs font-medium text-[#6B6568]">Mes actual</span>
            </div>
        </div>
    </div>
</div>