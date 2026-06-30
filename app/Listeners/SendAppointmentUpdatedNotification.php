<?php

namespace App\Listeners;

use App\Events\AppointmentUpdated;
use App\Mail\AppointmentUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentUpdatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AppointmentUpdated $event): void
    {
        $appointment = $event->appointment;
        $changes = $event->changes;
        
        // Enviar solo al cliente, con la lista de cambios
        if ($appointment->client && $appointment->client->user) {
            Mail::to($appointment->client->user->email)->send(new AppointmentUpdatedMail($appointment, $changes));
        }
    }
}
