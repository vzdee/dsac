<div class="mb-16">
    <div class="mb-8">
        <h2 class="text-2xl font-semibold leading-6 text-[#1F1F1F]">Resumen Operativo</h2>
        <p class="mt-2 text-sm text-[#6B6568]">Métricas enfocadas en tus tareas diarias.</p>
    </div>
    
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2">
        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-6 transition-all duration-300 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#F9F6F3] text-xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#6B6568]">Mis citas pendientes de hoy</p>
                    <p class="text-3xl font-bold text-[#1F1F1F]">{{ $myPendingAppointmentsToday }}</p>
                </div>
            </div>
            <div class="mt-4 border-t border-[#E4DFDC] pt-4">
                <a href="#" class="flex items-center text-sm font-medium text-[#B0393F] hover:text-[#8a2a30] transition-colors">
                    Ver calendario de hoy
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>

        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#E4DFDC] bg-white p-6 transition-all duration-300 hover:border-[#B0393F]/40 hover:shadow-xl hover:shadow-[#B0393F]/5">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#F9F6F3] text-xl text-[#B0393F] transition-colors group-hover:bg-[#B0393F] group-hover:text-white">
                    <i class="fa-solid fa-calendar-week"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#6B6568]">Total de mis citas (Semana)</p>
                    <div class="flex items-baseline gap-2">
                        <p class="text-3xl font-bold text-[#1F1F1F]">{{ $myTotalAppointmentsWeek }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 border-t border-[#E4DFDC] pt-4">
                <a href="#" class="flex items-center text-sm font-medium text-[#B0393F] hover:text-[#8a2a30] transition-colors">
                    Ver todas mis citas
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</div>