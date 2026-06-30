<?php

namespace App\Livewire\Admin;

use App\Models\Accountant;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentForm extends Component
{
    public $appointmentId;
    public $client;
    public $employee;
    public $service;
    public $date;
    public $appointmentStatus = 'pending';
    public $price;
    public $paymentMethod;
    public $paymentStatus = 'pending';
    public $notes;

    // options for selects
    public $appointmentStatusesOptions = [];
    public $paymentMethodsOptions = [];
    public $paymentStatusesOptions = [];

    // search properties
    public $searchDate;
    public $time;
    public $clients = [];
    public $employees = [];
    public $services = [];
    public $timeSlots = [];


    protected function rules()
    {
        return [
            'client' => 'required',
            'employee' => 'required',
            'service' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'appointmentStatus' => 'required|in:pending,programmed,completed,cancelled',
            'price' => 'required|numeric|min:0',
            'paymentMethod' => 'required|in:cash,card,transfer',
            'paymentStatus' => 'required|in:pending,paid,refunded',
            'notes' => 'nullable|string',
        ];
    }

    protected function messages($appointmentId = null)
    {
        return [
            'client.required' => 'Debes seleccionar un cliente para la cita.',
            'employee.required' => 'Debes asignar a un empleado para la cita.',
            'service.required' => 'El servicio es obligatorio.',
            'date.required' => 'Debes seleccionar un horario en la fecha deseada.',
            'time.required' => 'Debes seleccionar un horario disponible.',
            'appointmentStatus.required' => 'El estado de la cita es obligatorio.',
            'price.required' => 'El precio es obligatorio.',
            'paymentMethod.required' => 'El método de pago es obligatorio.',
            'paymentStatus.required' => 'El estado del pago es obligatorio.',
        ];
    }

    public function mount($appointmentId = null)
    {
        $this->clients = Client::whereHas('user', function ($query) {
            $query->role('Cliente');
        })->with('user')->get()->map(function ($client) {
            return [
                'value' => $client->id,
                'label' => $client->user->name . ' ' . $client->user->last_name
                    ?? 'usuario desconocido'
            ];
        })->toArray();

        $this->employees = Accountant::with('user')->get();

        $this->services = Service::where('status', 'active')->get()->map(function ($service) {
            return [
                'value' => $service->id,
                'label' => $service->name ?? 'servicio desconocido',
                'price' => $service->price ?? 0
            ];
        })->toArray();

        $this->appointmentStatusesOptions = [
            ['value' => 'pending', 'label' => 'Pendiente'],
            ['value' => 'programmed', 'label' => 'Programada'],
            ['value' => 'completed', 'label' => 'Completada'],
            ['value' => 'cancelled', 'label' => 'Cancelada'],
        ];

        $this->paymentMethodsOptions = [
            ['value' => 'cash', 'label' => 'Efectivo'],
            ['value' => 'card', 'label' => 'Tarjeta'],
            ['value' => 'transfer', 'label' => 'Transferencia'],
        ];

        $this->paymentStatusesOptions = [
            ['value' => 'pending', 'label' => 'Pendiente'],
            ['value' => 'paid', 'label' => 'Pagado'],
            ['value' => 'refunded', 'label' => 'Reembolsado'],
        ];

        $startTime = strtotime('09:00:00');
        $endTime = strtotime('18:00:00');
        $this->timeSlots = [];

        while ($startTime <= $endTime) {
            $this->timeSlots[] = date('H:i', $startTime);
            $startTime = strtotime('+1 hour', $startTime);
        }

        if ($appointmentId) {
            $appointment = Appointment::findOrFail($appointmentId);
            $this->appointmentId = $appointment->id;
            $this->client = $appointment->client_id;
            $this->employee = $appointment->employee_id;
            $this->service = $appointment->service_id;
            $this->date = Carbon::parse($appointment->scheduled_at)->format('Y-m-d');
            $this->time = Carbon::parse($appointment->scheduled_at)->format('H:i');
            $this->appointmentStatus = $appointment->status;
            $this->price = $appointment->service?->price ?? 0;
            $this->paymentMethod = $appointment->payment_method;
            $this->paymentStatus = $appointment->payment_status;
            $this->notes = $appointment->notes;

            $this->searchDate = $this->date;
        }
    }

    public function updatedSearchDate($value)
    {
        // Limpiamos los datos de horario si el usuario cambia de opinión de fecha
        $this->employee = null;
        $this->date = null;
        $this->time = null;
    }

    public function selectTime($employeeId, $time)
    {
        // Guardamos el empleado, la fecha buscada y la hora exacta en las variables "oficiales"
        $this->employee = $employeeId;
        $this->date = $this->searchDate;
        $this->time = $time;
    }

    public function updatedService($serviceId)
    {
        if ($serviceId) {
            $selectedService = collect($this->services)->firstWhere('value', $serviceId);
            $this->price = $selectedService['price'] ?? 0;
        } else {
            $this->price = 0;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'client_id' => $this->client,
            'employee_id' => $this->employee,
            'service_id' => $this->service,
            'scheduled_at' => Carbon::parse($this->date . ' ' . $this->time),
            'status' => $this->appointmentStatus,
            'price' => $this->price,
            'payment_method' => $this->paymentMethod,
            'payment_status' => $this->paymentStatus,
            'notes' => $this->notes,
        ];

        if ($this->appointmentId) {
            $appointment = Appointment::findOrFail($this->appointmentId);
            
            // Verificamos si cambió la fecha, el servicio o si el estado de pago pasó a "paid"
            $oldDate = $appointment->scheduled_at ? Carbon::parse($appointment->scheduled_at)->format('Y-m-d H:i') : null;
            $newDate = Carbon::parse($this->date . ' ' . $this->time)->format('Y-m-d H:i');
            
            $oldService = $appointment->service_id;
            $newService = $this->service;
            
            $oldEmployee = $appointment->employee_id;
            $newEmployee = $this->employee;
            
            $oldPaymentStatus = $appointment->payment_status;
            $newPaymentStatus = $this->paymentStatus;
            
            $oldStatus = $appointment->status;
            $newStatus = $this->appointmentStatus;
            
            $appointment->update($data);
            
            $changes = [];
            if ($oldDate !== $newDate) $changes[] = 'date';
            if ($oldService != $newService) $changes[] = 'service';
            if ($oldEmployee != $newEmployee) $changes[] = 'employee';
            if ($oldPaymentStatus !== 'paid' && $newPaymentStatus === 'paid') $changes[] = 'payment';
            if ($oldStatus === 'pending' && $newStatus === 'programmed') $changes[] = 'status';
            
            // Solo disparamos el evento si hubo cambios en los campos que nos importan
            if (count($changes) > 0) {
                \App\Events\AppointmentUpdated::dispatch($appointment, $changes);
            }
            
        } else {
            $appointment = Appointment::create($data);

            \App\Events\AppointmentCreated::dispatch($appointment);
        }

        // Emitimos notificación nativa de Livewire / TallStackUI o redirigimos
        return redirect()->route('admin.appointments.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Cita guardada con éxito',
            'text' => 'Se ha programado la cita correctamente.',
        ]);
    }

    public function render()
    {
        $bookedSlots = [];

        // Si el usuario ya seleccionó una fecha para buscar, consultamos la BD
        if ($this->searchDate) {
            $appointments = Appointment::whereDate('scheduled_at', $this->searchDate)
                ->where('status', '!=', 'cancelled');

            // Si estamos editando una cita, ignoramos la hora actual de ESTA cita para que parezca "disponible" a sí mismo
            if ($this->appointmentId) {
                $appointments->where('id', '!=', $this->appointmentId);
            }

            // Guardamos las horas ocupadas por cada empleado en un array
            foreach ($appointments->get() as $app) {
                if ($app->scheduled_at) {
                    $bookedSlots[$app->employee_id][] = $app->scheduled_at->format('H:i');
                }
            }
        }

        return view('livewire.admin.appointments.appointment-form', [
            'bookedSlots' => $bookedSlots
        ]);
    }
}
