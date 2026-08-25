<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('hotel_id')
                    ->relationship('hotel', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('max_guests')
                    ->required()
                    ->numeric()
                    ->default(2),
                TextInput::make('bed_type')
                    ->required(),
                TextInput::make('size')
                    ->numeric(),
                TextInput::make('size_unit')
                    ->required()
                    ->default('m²'),
                TextInput::make('price_per_night')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('balcony')
                    ->required(),
                Toggle::make('wifi')
                    ->required(),
                Toggle::make('smart_tv')
                    ->required(),
                Toggle::make('breakfast')
                    ->required(),
                Toggle::make('coffee_machine')
                    ->required(),
                Toggle::make('air_conditioning')
                    ->required(),
                Toggle::make('room_heater')
                    ->required(),
                Toggle::make('private_bathroom')
                    ->required(),
                Toggle::make('toiletries')
                    ->required(),
                Toggle::make('garden_access')
                    ->required(),
                Toggle::make('lounge_area')
                    ->required(),
                Toggle::make('meals_included')
                    ->required(),
                Toggle::make('safari_guidance')
                    ->required(),
                Toggle::make('mini_bar')
                    ->required(),
                Toggle::make('refreshments')
                    ->required(),
                TextInput::make('total_rooms')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('available_rooms')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
