@props(['titleWindow' => '', 'breadcrumbs' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DSAC') . ' | ' . ($titleWindow ?? '') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/e732c9a5c1.js" crossorigin="anonymous"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- TallStackui --}}
    <tallstackui:script />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('components.includes.admin.navbar')
        @include('components.includes.admin.sidebar')
        <!-- Page Content -->
        <main class="pt-20 px-6 pb-10 lg:ml-64 lg:px-8">
            <div class="mx-auto max-w-[98vw]">
                <x-ts-card>
                    <x-slot:header>
                        <div class="flex flex-col gap-6">
                            @include('components.includes.admin.breadcrumbs')
                            @isset($head)
                                {{ $head }}
                            @endisset
                        </div>
                    </x-slot:header>
                    {{ $slot }}
                </x-ts-card>
            </div>
        </main>
    </div>

    @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif
    @livewireScripts
</body>

</html>
