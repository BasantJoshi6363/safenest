<?php 
namespace App\Filament\Resources;

use App\Filament\Resources\HotelRegistrationRequestResource\Pages;
use App\Models\HotelRegistrationRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class HotelRegistrationRequestResource extends Resource
{
    protected static ?string $model = HotelRegistrationRequest::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Hotel Requests';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Components\TextInput::make('owner_name')->disabled(),
            Components\TextInput::make('email')->disabled(),
            Components\TextInput::make('phone')->disabled(),
            Components\TextInput::make('hotel_name')->disabled(),
            Components\TextInput::make('city')->disabled(),
            Components\Textarea::make('message')->disabled()->columnSpanFull(),
            Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('hotel_name')->searchable(),
            Tables\Columns\TextColumn::make('owner_name')->searchable(),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('city'),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    default => 'gray',
                }),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotelRegistrationRequests::route('/'),
            'edit' => Pages\EditHotelRegistrationRequest::route('/{record}/edit'),
        ];
    }
}