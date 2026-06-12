<div class="flex items-center gap-4">
    <div>
        <x-ts-button href="{{ route('admin.clients.edit', $client->id) }}" color="blue" title="Editar Datos del Cliente">
            <i class="fa-solid fa-pen"></i>
        </x-ts-button>
    </div>
    <div>
        <x-ts-button href="{{ route('admin.clients.show', $client->id) }}" color="green" title="Ver Detalles del Cliente">
            <i class="fa-solid fa-eye"></i>
        </x-ts-button>
    </div>
    <div>
        <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="js-confirm-action">
            @csrf
            @method('DELETE')
            <x-ts-button type="submit" color="red" title="Eliminar Cliente">
                <i class="fa-solid fa-trash"></i>
            </x-ts-button>
        </form>
    </div>
</div>
