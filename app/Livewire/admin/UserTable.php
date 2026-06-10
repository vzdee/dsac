<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function builder(): Builder
    {
        return User::query()->with('roles');
    }

    public function columns(): array
    {
        return [
            Column::make("Id Usuario", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre(s)", "name")
                ->searchable(),
            Column::make("Apellido(s)", "last_name")
                ->searchable(),
            Column::make("Correo", "email")
                ->searchable(),
            Column::make("Teléfono", "phone_number")
                ->searchable(),
            Column::make("Rol Asignado")
                ->label(function ($row) {
                    $role = $row->roles->first()?->name;
                    return match ($role) {
                        'Administrador' => '<span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">Administrador</span>',
                        'Contador' => '<span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">Contador</span>',
                        'Cliente' => '<span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">Cliente</span>',
                        default => '<span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">Sin Rol</span>',
                    };
                })->html(),
            Column::make("Fecha de Creación", "created_at")
                ->sortable()
                ->format(function ($value) {
                    return date('d M Y - h:i a', strtotime($value));
                }),
            Column::make("Acciones", "actions")
                ->label(function ($row) {
                    return view('admin.users.actions', ['user' => $row]);
                }),
        ];
    }
}
