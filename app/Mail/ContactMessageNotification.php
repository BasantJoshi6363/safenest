<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $data
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mail.from.address'),
                config('mail.from.name', 'SafeNest')
            ),

            to: [
                new Address(
                    config('mail.contact_address')
                ),
            ],

            replyTo: [
                new Address(
                    $this->data['email'],
                    $this->data['name']
                ),
            ],

            subject: 'New Contact Inquiry: ' . $this->data['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-message',
            with: [
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'phone' => $this->data['phone'] ?? null,
                'subject' => $this->data['subject'],
                'contactMessage' => $this->data['message'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->withSymfonyMessage(function ($message) {
            $message->embedFromPath(
                public_path('images/tab_logo.png'),
                'safenest-logo'
            );
        });
    }
}