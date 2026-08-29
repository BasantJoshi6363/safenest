<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Room;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Booking')
                ->schema([
                    Select::make('hotel_id')
                        ->relationship('hotel', 'name')
                        ->searchable()->preload()->required()
                        ->live()
                        ->afterStateUpdated(fn (Set $set) => $set('room_id', null)),

                    Select::make('room_id')
                        ->label('Room')
                        ->options(fn (Get $get) => $get('hotel_id')
                            ? Room::where('hotel_id', $get('hotel_id'))->pluck('name', 'id')
                            : [])
                        ->searchable()->required()->live()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            if ($room = Room::find($state)) {
                                $set('price_per_night', $room->price_per_night);
                            }
                        }),

                    DatePicker::make('check_in')->required()->live()
                        ->minDate(now())
                        ->afterStateUpdated(fn (Set $set, Get $get) =>
                            self::recalc($set, $get)),

                    DatePicker::make('check_out')->required()->live()
                        ->minDate(fn (Get $get) => $get('check_in') ?? now())
                        ->afterStateUpdated(fn (Set $set, Get $get) =>
                            self::recalc($set, $get)),

                    TextInput::make('guests')->numeric()->default(1)->required(),

                    Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'confirmed' => 'Confirmed',
                            'checked_in' => 'Checked In',
                            'checked_out' => 'Checked Out',
                            'cancelled' => 'Cancelled',
                        ])->default('pending')->required(),

                    Select::make('payment_status')
                        ->options([
                            'unpaid' => 'Unpaid',
                            'paid' => 'Paid',
                            'refunded' => 'Refunded',
                        ])->default('unpaid')->required(),
                ])->columns(2),

            Section::make('Guest Details')
                ->schema([
                    TextInput::make('guest_name')->required(),
                    TextInput::make('guest_email')->email()->required(),
                    TextInput::make('guest_phone'),
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()->preload()
                        ->label('Linked User (optional)'),
                ])->columns(2),

            Section::make('Pricing')
                ->schema([
                    TextInput::make('price_per_night')->numeric()->prefix('NPR')->required(),
                    TextInput::make('nights')->numeric()->disabled()->dehydrated(),
                    TextInput::make('total_price')->numeric()->prefix('NPR')->disabled()->dehydrated(),
                ])->columns(3),

            Textarea::make('special_requests')->columnSpanFull(),
        ]);
    }

    protected static function recalc(Set $set, Get $get): void
    {
        $checkIn = $get('check_in');
        $checkOut = $get('check_out');
        $price = $get('price_per_night');

        if ($checkIn && $checkOut && $price) {
            $nights = (int) \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut));
            $set('nights', max($nights, 0));
            $set('total_price', max($nights, 0) * $price);
        }
    }
}