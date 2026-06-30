<?php

namespace App\Listeners;

use App\Events\AppointmentCreated;
use App\Mail\AppointmentCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentNotification implements ShouldQueue
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
    public function handle(AppointmentCreated $event): void
    {
        $appointment = $event->appointment;
        
        // 1. Enviar al cliente
        if ($appointment->client && $appointment->client->user) {
            Mail::to($appointment->client->user->email)->send(new AppointmentCreatedMail($appointment));
        }
    }
}
