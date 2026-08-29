<?php

namespace App\Observers;

use App\Mail\BookingCreatedMail;
use App\Models\Order;
use Mail;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
       if ($order->guest_email) {
            // Pre-load relationships so hotel and room names render smoothly in email
            $order->loadMissing(['room.hotel', 'hotel']);

            Mail::send(new BookingCreatedMail($order));
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
