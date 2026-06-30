<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Appointment;

class AppointmentTable extends DataTableComponent
{
    protected $model = Appointment::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id Servicio", "id")
                ->sortable(),
            Column::make("Cliente", "client.user.email")
                ->searchable(),
            Column::make("Empleado", "employee.user.email")
                ->searchable(),
            Column::make("Tipo Servicio", "service.name"),
            Column::make("Estado Servicio", "status")
                ->sortable()
                ->format(function ($value) {
                    return match ($value) {
                        'pending' => '<span class="bg-yellow-200 text-yellow-800 p-2 rounded text-xs">Pendiente</span>',
                        'programmed' => '<span class="bg-blue-200 text-blue-800 p-2 rounded text-xs">Programada</span>',
                        'cancelled' => '<span class="bg-red-200 text-red-800 p-2 rounded text-xs">Cancelada</span>',
                        'completed' => '<span class="bg-green-200 text-green-800 p-2 rounded text-xs">Completada</span>',
                    };
                })->html(),
            Column::make("Fecha Programada", "scheduled_at")
                ->sortable()
                ->format(function ($value) {
                    return date('d M Y - h:i a', strtotime($value));
                }),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.appointments.actions', ['appointment' => $row]);
                }),
        ];
    }
}
