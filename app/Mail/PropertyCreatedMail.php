<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropertyCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Поздравляем! Объявление было успешно создано!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.property_created_mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
