<div class="flex items-center gap-2">
    <div>
        <x-ts-button href="{{ route('admin.appointments.edit', $appointment->id) }}" color="blue" title="Editar Datos de la Cita">
            <i class="fa-solid fa-pen-to-square text-xs"></i>
        </x-ts-button>
    </div>
    <div>
        <x-ts-button href="{{ route('admin.appointments.show', $appointment->id) }}" color="green" title="Ver Detalles del Cita">
            <i class="fa-solid fa-eye text-xs"></i>
        </x-ts-button>
    </div>
    <div>
        <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="js-confirm-action">
            @csrf
            @method('DELETE')
            <x-ts-button type="submit" color="red" title="Eliminar Cita">
                <i class="fa-solid fa-trash text-xs"></i>
            </x-ts-button>
        </form>
    </div>
</div>
