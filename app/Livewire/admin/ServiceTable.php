<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;

class ServiceTable extends DataTableComponent
{
    protected $model = Service::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("ID Servicio", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre Servicio", "name")
                ->searchable(),
            Column::make("Descripción Servicio", "description")
                ->format(function($value){
                    return strlen($value) > 35 ? substr($value, 0, 35) . '...' : $value;
                }),
            Column::make("Precio MXN", "price")
                ->sortable()
                ->format(function($value){
                    return '$' . number_format($value,0,',',',');
                }),
            Column::make("Estado", "status")
                ->sortable()
                ->format(function($value){
                    return $value === 'active' 
                    ? '<span class="bg-green-200 text-sm text-green-600 p-1 rounded font-semibold" > Activo</span>' 
                    : '<span class="bg-red-200 text-sm text-red-600 p-1 rounded font-semibold" > Inactivo</span>';
                })->html(),
            Column::make("Acciones")
                ->label(function($row){
                    return view('admin.services.actions', ['service' => $row]);
                }),
        ];
    }
}
