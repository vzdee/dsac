@php
    $routes = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'href' => '',
            'active' => '',
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'href' => '',
            'active' => '',
        ],
        [
            'name' => 'Clientes',
            'icon' => 'fa-solid fa-user-group',
            'href' => '#',
            'active' => '',
        ],
        [
            'name' => 'Servicios',
            'icon' => 'fa-solid fa-briefcase',
            'href' => '',
            'active' => '',
        ],
        [
            'name' => 'Citas',
            'icon' => 'fa-solid fa-calendar-days',
            'href' => '#',
            'active' => '',
        ],
    ];
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
            @foreach ($routes as $route)
                <a href="{{ $route['href'] }}"
                    class="group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition {{ $route['active'] ? 'bg-[#B0393f] text-white shadow-sm' : 'text-[#4B4643] hover:bg-[#B0393F]/10 hover:text-[#B0393F]' }}">
                    <span
                        class="flex h-9 w-9 items-center justify-center rounded-lg transition {{ $route['active'] ? 'bg-white/15 text-white' : 'bg-[#F7F4EF] text-[#B0393F] group-hover:bg-white' }}">
                        <i class="{{ $route['icon'] }} text-sm"></i>
                    </span>
                    <span>
                        {{ $route['name'] }}
                    </span>
                </a>
            @endforeach
        </nav>
    </div>
</aside>
