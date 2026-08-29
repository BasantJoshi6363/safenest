<?php

namespace App\Filament\Resources\Hotels\Pages;

use App\Filament\Resources\Hotels\HotelResource;
use App\Mail\HotelCreatedMail;
use Filament\Resources\Pages\CreateRecord;
use Mail;

class CreateHotel extends CreateRecord
{
    protected static string $resource = HotelResource::class;

     protected function afterCreate(): void
    {
        $hotel = $this->record;

        Mail::to($hotel->email)
            ->send(new HotelCreatedMail($hotel));
    }
}
