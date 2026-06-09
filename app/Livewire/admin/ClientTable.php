<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ClientTable extends DataTableComponent
{
    protected $model = Client::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function builder(): Builder
    {
        return Client::query()->with('User');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre(s)", "user.name"),
            Column::make("Correo", "user.email"),
            Column::make("Rfc", "rfc")
                ->format(function ($value){
                    return $value ?? 'Sin Datos Registrados';
                }),
            Column::make("Created at", "created_at")
                ->sortable()
                ->format(function ($value) {
                    return date('d M Y - h:i a', strtotime($value));
                }),
            Column::make("Actualizado ", "updated_at")
                ->sortable()
                ->format(function ($value) {
                    return date('d M Y - h:i a', strtotime($value));
                }),
            Column::make("Acciones")
                ->label(function ($row){
                    return view('admin.clients.actions', ['client' => $row]);
                }),

        ];
    }
}
