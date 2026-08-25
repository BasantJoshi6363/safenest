<?php

namespace App\Filament\Resources\Rooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RoomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hotel.name')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('max_guests')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bed_type')
                    ->searchable(),
                TextColumn::make('size')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('size_unit')
                    ->searchable(),
                TextColumn::make('price_per_night')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('image'),
                IconColumn::make('balcony')
                    ->boolean(),
                IconColumn::make('wifi')
                    ->boolean(),
                IconColumn::make('smart_tv')
                    ->boolean(),
                IconColumn::make('breakfast')
                    ->boolean(),
                IconColumn::make('coffee_machine')
                    ->boolean(),
                IconColumn::make('air_conditioning')
                    ->boolean(),
                IconColumn::make('room_heater')
                    ->boolean(),
                IconColumn::make('private_bathroom')
                    ->boolean(),
                IconColumn::make('toiletries')
                    ->boolean(),
                IconColumn::make('garden_access')
                    ->boolean(),
                IconColumn::make('lounge_area')
                    ->boolean(),
                IconColumn::make('meals_included')
                    ->boolean(),
                IconColumn::make('safari_guidance')
                    ->boolean(),
                IconColumn::make('mini_bar')
                    ->boolean(),
                IconColumn::make('refreshments')
                    ->boolean(),
                TextColumn::make('total_rooms')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('available_rooms')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
