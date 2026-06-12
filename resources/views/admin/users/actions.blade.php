<div class="flex items-center gap-4">
    <div>
        <x-ts-button href="{{ route('admin.users.edit', $user->id) }}" color="blue" title="Editar Usuario">
            <i class="fa-solid fa-pen"></i>
        </x-ts-button>
    </div>
    <div>
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="js-confirm-action">
            @csrf
            @method('DELETE')
            <x-ts-button type="submit" color="red" title="Eliminar Usuario">
                <i class="fa-solid fa-trash"></i>
            </x-ts-button>
        </form>
    </div>
</div>
