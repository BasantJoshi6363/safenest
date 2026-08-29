<?php
namespace App\Mail;
use App\Models\Hotel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class HotelCreatedMail extends Mailable
{
    use Queueable, SerializesModels; /** * Create a new message instance. */
    public function __construct(public Hotel $hotel)
    {
    } /** * Get the message envelope. */
    public function envelope(): Envelope
    {
        return new Envelope(from: new Address(config('mail.from.address'), config('mail.from.name', 'SafeNest')), to: [new Address($this->hotel->email, $this->hotel->name),], subject: 'Your Hotel Has Been Registered with SafeNest', );
    } /** * Get the message content definition. */
    public function content(): Content
    {
        return new Content(view: 'emails.hotel-created', with: ['hotel' => $this->hotel,], );
    } /** * Get the attachments for the message. */
    public function attachments(): array
    {
        return [];
    } /** * Embed SafeNest logo into the email. */
    public function build()
    {
        return $this->withSymfonyMessage(function ($message) {
            $message->embedFromPath(public_path('images/tab_logo.png'), 'safenest-logo'); });
    }
}