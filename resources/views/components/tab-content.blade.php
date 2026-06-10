@props(['tab', 'error' => false])
<div x-show="tab === '{{ $tab }}'" style="display: none;"> 
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        {{ $slot }}
    </div>
</div>