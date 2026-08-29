<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name', 'SafeNest')),
            to: [new Address($this->order->guest_email, $this->order->guest_name)],
            subject: 'Booking Request Received [' . $this->order->order_number . '] - SafeNest',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-created',
            with: ['order' => $this->order],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->withSymfonyMessage(function ($message) {
            $message->embedFromPath(public_path('images/tab_logo.png'), 'safenest-logo');
        });
    }
}