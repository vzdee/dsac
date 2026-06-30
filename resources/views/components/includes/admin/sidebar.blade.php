@php
    $menuItems = config('menu.sidebar', []);
@endphp

<aside id="top-bar-sidebar"
    class="fixed left-0 top-16 z-40 h-[calc(100vh-4rem)] w-64 -translate-x-full border-r border-[#E4E0D8] bg-white transition-transform lg:translate-x-0"
    aria-label="Sidebar">

    <div class="flex h-full flex-col px-4 py-6">

        {{-- Título del menú --}}
        <div class="mb-6 px-3">
            <p class="text-[.68rem] font-bold uppercase tracking-[.18em] text-[#B0393F]">Administración</p>
            <p class="mt-2 text-sm leading-6 text-[#7A7470]">Gestión del sistema DSAC</p>
        </div>

        {{-- Navegación --}}
        <nav class="flex flex-1 flex-col gap-1">
            @foreach ($menuItems as $item)
                @hasanyrole($item['roles'])
                    @php
                        $isActive = request()->routeIs($item['active_pattern']);
                    @endphp
                    <a href="{{ route($item['route']) }}"
                        class="group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition {{ $isActive ? 'bg-[#B0393f] text-white shadow-sm' : 'text-[#4B4643] hover:bg-[#B0393F]/10 hover:text-[#B0393F]' }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg transition {{ $isActive ? 'bg-white/15 text-white' : 'bg-[#F7F4EF] text-[#B0393F] group-hover:bg-white' }}">
                            <i class="{{ $item['icon'] }} text-sm"></i>
                        </span>
                        <span>
                            {{ $item['name'] }}
                        </span>
                    </a>
                @endhasanyrole
            @endforeach
        </nav>
    </div>
</aside>
