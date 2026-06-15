<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Accountant;
use Illuminate\Database\Eloquent\Builder;

class EmployeeTable extends DataTableComponent
{
    protected $model = Accountant::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function builder(): Builder
    {
        return Accountant::query()->with('user');
    }

    public function columns(): array
    {
        return [
            Column::make("ID Empleado", "id")
                ->searchable()
                ->sortable(),
            Column::make("Nombre Empleado", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Correo Electrónico", "user.email")
                ->sortable()
                ->searchable(),
            Column::make("Número de Teléfono", "user.phone_number")
                ->sortable()
                ->searchable(),
            Column::make("Fecha de Creación", "user.created_at")
                ->sortable()
                ->format(function($value){
                    return date('d M Y - h:i A', strtotime($value));
                }),
            Column::make("Fecha de Actualización", "user.updated_at")
                ->sortable()
                ->format(function($value){
                    return date('d M Y - h:i A', strtotime($value));
                }),
            Column::make("Acciones")
                ->label(function($row){
                    return view('admin.employees.actions', ['employee' => $row]);
                }),
        ];
    }
}
