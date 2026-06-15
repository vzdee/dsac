<div class="flex items-center gap-4">
    <div>
        <x-ts-button href="{{ route('admin.employees.edit', $employee->id) }}" color="blue" title="Editar Datos del Empleado">
            <i class="fa-solid fa-pen"></i>
        </x-ts-button>
    </div>
    <div>
        <x-ts-button href="{{ route('admin.employees.show', $employee->id) }}" color="green" title="Ver Detalles del Empleado">
            <i class="fa-solid fa-eye"></i>
        </x-ts-button>
    </div>
    <div>
        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" class="js-confirm-action">
            @csrf
            @method('DELETE')
            <x-ts-button type="submit" color="red" title="Eliminar Empleado">
                <i class="fa-solid fa-trash"></i>
            </x-ts-button>
        </form>
    </div>
</div>
