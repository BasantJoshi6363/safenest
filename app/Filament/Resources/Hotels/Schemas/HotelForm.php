<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('destination')
                    ->required(),
                TextInput::make('address'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price_per_night')
                    ->required()
                    ->numeric(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Toggle::make('wifi')
                    ->required(),
                Toggle::make('pool')
                    ->required(),
                Toggle::make('breakfast')
                    ->required(),
                Toggle::make('air_conditioning')
                    ->required(),
                Toggle::make('parking')
                    ->required(),
                Toggle::make('restaurant')
                    ->required(),
                Toggle::make('bar')
                    ->required(),
                Toggle::make('safari')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
