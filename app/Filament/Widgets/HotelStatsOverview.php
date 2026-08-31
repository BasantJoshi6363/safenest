<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HotelStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // 1. Calculate Today's Revenue
        $todaysRevenue = Order::query()
            ->whereDate('created_at', today())
            ->where('payment_status', 'paid')
            ->sum('total_price');

        // Fix: Use today()->subDay() instead of yesterday()
        $yesterdaysRevenue = Order::query()
            ->whereDate('created_at', today()->subDay())
            ->where('payment_status', 'paid')
            ->sum('total_price');

        $revenueDifference = $todaysRevenue - $yesterdaysRevenue;
        $revenueTrendIcon = $revenueDifference >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $revenueColor = $revenueDifference >= 0 ? 'success' : 'danger';

        // 2. Calculate Occupancy Rate
        $totalRooms = Room::count();
        $occupiedRooms = Order::query()
            ->where('status', 'checked_in')
            ->count();

        $occupancyRate = $totalRooms > 0 
            ? round(($occupiedRooms / $totalRooms) * 100, 1) 
            : 0;

        // 3. Count Pending Arrivals for Today
        $pendingArrivals = Order::query()
            ->whereDate('check_in', today())
            ->where('status', 'confirmed')
            ->count();

        // 4. Calculate Average Daily Rate (ADR)
        $averageDailyRate = Order::query()
            ->where('status', 'checked_in')
            ->avg('total_price') ?? 0;

        return [
            Stat::make("Today's Revenue", '$' . number_format($todaysRevenue, 2))
                ->description($revenueDifference >= 0 
                    ? '+$' . number_format($revenueDifference, 2) . ' from yesterday'
                    : '-$' . number_format(abs($revenueDifference), 2) . ' from yesterday')
                ->descriptionIcon($revenueTrendIcon)
                ->color($revenueColor)
                ->chart([$yesterdaysRevenue, $todaysRevenue]),

            Stat::make('Occupancy Rate', "{$occupancyRate}%")
                ->description("{$occupiedRooms} of {$totalRooms} rooms occupied")
                ->descriptionIcon('heroicon-m-home-modern')
                ->color($occupancyRate >= 70 ? 'success' : ($occupancyRate >= 40 ? 'warning' : 'danger')),

            Stat::make('Pending Check-ins', $pendingArrivals)
                ->description('Guests arriving today')
                ->descriptionIcon('heroicon-m-arrow-right-end-on-rectangle')
                ->color($pendingArrivals > 0 ? 'info' : 'gray'),

            Stat::make('Average Daily Rate (ADR)', '$' . number_format($averageDailyRate, 2))
                ->description('Average revenue per occupied room')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary'),
        ];
    }
}