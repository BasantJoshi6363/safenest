<?php 
namespace App\Mail;

use App\Models\HotelRegistrationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HotelRegistrationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public HotelRegistrationRequest $requestData) {}

    public function build()
    {
        return $this->subject('New Hotel Partner Request: ' . $this->requestData->hotel_name)
                    ->view('emails.hotel-registration');
    }
}