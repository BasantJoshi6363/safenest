<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as BaseWidget;

class TodaysArrivalsTable extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = "Today's Expected Arrivals";
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '10s';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $hotelId = $this->filters['hotel_id'] ?? null;

        $query = Order::query()
            ->with(['hotel', 'room'])
            ->whereDate('check_in', today())
            ->where('status', 'confirmed');

        if ($hotelId) {
            $query->where('hotel_id', $hotelId);
        }

        return $table
            ->query($query)
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Order #')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('guest_name')
                    ->label('Guest Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('hotel.name')
                    ->label('Hotel')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('room.room_number')
                    ->label('Room #')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('nights')
                    ->label('Nights')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        default => 'warning',
                    }),
            ])
            ->actions([
                Action::make('checkIn')
                    ->label('Check In')
                    ->icon('heroicon-m-arrow-right-end-on-rectangle')
                    ->color('success')
                    ->button()
                    ->requiresConfirmation()
                    ->modalHeading('Check In Guest')
                    ->modalDescription('Are you sure you want to mark this guest as checked in?')
                    ->action(function (Order $record) {
                        $record->update(['status' => 'checked_in']);

                        Notification::make()
                            ->title('Guest Checked In Successfully')
                            ->success()
                            ->send();
                    }),

                Action::make('updatePayment')
                    ->label('Payment')
                    ->icon('heroicon-m-currency-dollar')
                    ->color('primary')
                    ->form([
                        Select::make('payment_status')
                            ->options([
                                'paid' => 'Paid',
                                'unpaid' => 'Unpaid',
                                
                            ])
                            ->required(),
                    ])
                    ->action(function (Order $record, array $data) {
                        $record->update(['payment_status' => $data['payment_status']]);

                        Notification::make()
                            ->title('Payment Status Updated')
                            ->success()
                            ->send();
                    }),
            ]);
    }
}