<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingChart extends ChartWidget
{
    protected ?string $heading = 'Bookings Trend';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Query monthly count for the current year
        $monthlyCounts = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', now()->year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('count', 'month')
        ->toArray();

        // Build 12-month data array initialized with zeros
        $data = [];
        $labels = [];

        for ($m = 1; $m <= 12; $m++) {
            $data[] = $monthlyCounts[$m] ?? 0;
            $labels[] = Carbon::create()->month($m)->format('M');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Bookings Created',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}