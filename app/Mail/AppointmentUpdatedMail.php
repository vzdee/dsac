<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $changes;

    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment, array $changes)
    {
        $this->appointment = $appointment;
        $this->changes = $changes;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Actualización en tu Cita',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.appointment-updated',
            with: [
                'appointment' => $this->appointment,
                'changes' => $this->changes
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
