<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanesPagoEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombre;

    /**
     * Crear una nueva instancia del mensaje.
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Definir el asunto del mensaje (Envelope).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Conoce nuestros Planes de Pago',
        );
    }

    /**
     * Definir la vista que se usará como contenido.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.planes_pago',
            with: ['nombre' => $this->nombre],
        );
    }

    /**
     * Adjuntos del mensaje.
     */
    public function attachments(): array
    {
        return [];
    }
}
