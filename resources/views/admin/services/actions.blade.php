<div class="flex items-center gap-4">
    <div>
        <x-ts-button href="{{ route('admin.services.edit', $service->id) }}" color="blue" title="Editar Servicio">
            <i class="fa-solid fa-pen"></i>
        </x-ts-button>
    </div>
    <div>
        <x-ts-button href="{{ route('admin.services.show', $service->id) }}" color="green" title="Ver Detalles del Servicio">
            <i class="fa-solid fa-eye"></i>
        </x-ts-button>
    </div>
    <div>
        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-ts-button type="submit" color="red" title="Eliminar Servicio">
                <i class="fa-solid fa-trash"></i>
            </x-ts-button>
        </form>
    </div>
</div>
