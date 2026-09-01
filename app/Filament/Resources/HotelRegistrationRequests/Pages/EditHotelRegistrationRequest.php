<?php

namespace App\Filament\Resources\HotelRegistrationRequests\Pages;

use App\Filament\Resources\HotelRegistrationRequests\HotelRegistrationRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHotelRegistrationRequest extends EditRecord
{
    protected static string $resource = HotelRegistrationRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
