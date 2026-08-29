<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->searchable()->copyable(),
                TextColumn::make('hotel.name')->searchable(),
                TextColumn::make('payment_method')
                    ->badge()
                    ->colors([
                        'info' => 'esewa',
                        'primary' => 'card',
                        'gray' => 'pay_at_checkin',
                    ]),
                TextColumn::make('transaction_id')->searchable()->toggleable(),
                TextColumn::make('room.name')->searchable(),
                TextColumn::make('guest_name')->searchable(),
                TextColumn::make('check_in')->date()->sortable(),
                TextColumn::make('check_out')->date()->sortable(),
                TextColumn::make('nights')->sortable(),
                TextColumn::make('total_price')->money('NPR')->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'info' => 'checked_in',
                        'gray' => 'checked_out',
                        'danger' => 'cancelled',
                    ]),
                BadgeColumn::make('payment_status')
                    ->colors([
                        'danger' => 'unpaid',
                        'success' => 'paid',
                        'gray' => 'refunded',
                    ]),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'checked_in' => 'Checked In',
                    'checked_out' => 'Checked Out',
                    'cancelled' => 'Cancelled',
                ]),
                SelectFilter::make('payment_status')->options([
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                    'refunded' => 'Refunded',
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}