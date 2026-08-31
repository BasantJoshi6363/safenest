<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalRevenue = Order::where('payment_status', 'paid')
            ->sum(DB::raw('nights * price_per_night'));

        $totalBookings = Order::count();
        $activeHotels = Hotel::where('is_active', true)->count();
        $unreadMessages = Contact::where('is_read', false)->count();

        return [
            Stat::make('Total Revenue', '$' . number_format($totalRevenue, 2))
                ->description('From confirmed paid orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Bookings', $totalBookings)
                ->description('All time orders')
                ->color('primary'),

            Stat::make('Active Properties', "{$activeHotels} Hotels / " . Room::where('is_active', true)->count() . " Rooms")
                ->description('Listed on site')
                ->color('info'),

            Stat::make('Unread Contacts', $unreadMessages)
                ->description('Requires attention')
                ->color($unreadMessages > 0 ? 'danger' : 'gray'),
        ];
    }
}