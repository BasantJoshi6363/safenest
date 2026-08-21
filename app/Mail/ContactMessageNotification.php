<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

public function build()
{
    return $this->subject('New Guest Inquiry - SafeNest')
                ->replyTo($this->data['email'], $this->data['name'])
                ->view('emails.contact-message') // Changed from markdown to view
                ->with([
                    'name'    => $this->data['name'],
                    'email'   => $this->data['email'],
                    'content' => $this->data['message'],
                ]);
}
}