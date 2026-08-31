<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentOrdersTable extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '10s';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $hotelId = $this->filters['hotel_id'] ?? null;
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        $query = Order::query()->with(['hotel', 'room'])->latest();

        if ($hotelId) {
            $query->where('hotel_id', $hotelId);
        }

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        return $table
            ->query($query)
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('guest_name')
                    ->label('Guest')
                    ->searchable(),

                Tables\Columns\TextColumn::make('hotel.name')
                    ->label('Hotel')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('check_in')
                    ->date('M d, Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('check_out')
                    ->date('M d, Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed'  => 'success',
                        'checked_in' => 'info',
                        'pending'    => 'warning',
                        'cancelled'  => 'danger',
                        default      => 'gray',
                    }),

                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'paypal' => 'primary',
                        'cash' => 'warning',
                        'credit_card', 'stripe' => 'success',
                        'bank_transfer' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'paypal' => '🅿️ PayPal',
                        'cash' => '💵 Cash',
                        'credit_card' => '💳 Credit Card',
                        'stripe' => '💳 Stripe',
                        'bank_transfer' => '🏦 Bank Transfer',
                        default => strtoupper($state ?? 'N/A'),
                    })
                    ->description(function (Order $record): ?string {
                        if ($record->payment_method === 'paypal') {
                            return $record->payment_status === 'paid' 
                                ? '✅ PayPal Confirmed' 
                                : '⏳ Pending PayPal Payment';
                        }

                        if ($record->payment_method === 'cash') {
                            return $record->payment_status === 'paid' 
                                ? '✅ Cash Collected' 
                                : '⏳ Pending Cash';
                        }

                        return null;
                    }),

                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        'refunded' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => ucfirst($state ?? 'Unpaid')),

                Tables\Columns\TextColumn::make('total_price')
                    ->money('USD')
                    ->sortable(),
            ])
            ->defaultPaginationPageOption(5)
            ->actions([
                Action::make('updatePayment')
                    ->label('Payment')
                    ->icon('heroicon-m-currency-dollar')
                    ->color('info')
                    ->fillForm(fn (Order $record): array => [
                        'payment_method' => $record->payment_method,
                        'payment_status' => $record->payment_status ?? 'unpaid',
                    ])
                    ->form([
                        Select::make('payment_method')
                            ->label('Payment Method')
                            ->options([
                                'paypal' => 'PayPal',
                                'cash' => 'Cash',
                                'credit_card' => 'Credit Card',
                                'stripe' => 'Stripe',
                                'bank_transfer' => 'Bank Transfer',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->label('Payment Status')
                            ->options([
                                'paid' => 'Paid',
                                'unpaid' => 'Unpaid',
                                'refunded' => 'Refunded',
                            ])
                            ->required(),
                    ])
                    ->action(function (Order $record, array $data) {
                        $record->update([
                            'payment_method' => $data['payment_method'],
                            'payment_status' => $data['payment_status'],
                        ]);

                        Notification::make()
                            ->title('Payment Details Updated')
                            ->success()
                            ->send();
                    }),

                ViewAction::make()
                    ->modalHeading(fn (Order $record): string => "Order Details #{$record->order_number}")
                    ->form([
                        TextInput::make('order_number')->label('Order Number')->disabled(),
                        TextInput::make('guest_name')->label('Guest Name')->disabled(),
                        TextInput::make('payment_method')->label('Payment Method')->disabled(),
                        TextInput::make('payment_status')->label('Payment Status')->disabled(),
                        TextInput::make('total_price')->label('Total Price ($)')->disabled(),
                    ]),
            ]);
    }
}