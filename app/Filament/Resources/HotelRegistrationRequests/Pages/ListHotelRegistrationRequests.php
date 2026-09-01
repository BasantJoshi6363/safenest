<?php

namespace App\Filament\Resources\HotelRegistrationRequests\Pages;

use App\Filament\Resources\HotelRegistrationRequests\HotelRegistrationRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHotelRegistrationRequests extends ListRecords
{
    protected static string $resource = HotelRegistrationRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
