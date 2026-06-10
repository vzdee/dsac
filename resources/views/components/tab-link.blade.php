@props(['tab', 'error' => false])
<li class="me-2" x-on:click="tab = '{{ $tab }}'">
    <a href="#" 
    :aria-current="tab === '{{ $tab }}' ? 'page' : 'undefined'"
    :class="{
            'text-red-600 border-red-600': {{ $error ? 'true' : 'false' }} &&
                tab !== '{{ $tab }}',
            'text-blue-600 border-blue-600 active': tab === '{{ $tab }}' && !
                {{ $error ? 'true' : 'false' }},
            'text-red-600 border-red-600 active': tab === '{{ $tab }}' &&
                {{ $error ? 'true' : 'false' }},
            'border-transparent hover:text-gray-500 hover:border-gray-300': tab !== '{{ $tab }}' &&
                !{{ $error ? 'true' : 'false' }},
        }"
    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors duration-20 {{ $error ? 'text-red-600 border-red-600' : ''}}">
        {{ $slot }}
    </a>

    @if($error)
        <i class="fa-solid fa-exclamation-triangle text-danger animate-pulse ms-2"></i>
    @endif
</li>