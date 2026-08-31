<?php

namespace App\Filament\Widgets;

use App\Models\Room;
use Filament\Widgets\ChartWidget;

class OccupancyChart extends ChartWidget
{
    protected ?string $heading = 'Room Occupancy Breakdown';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $available = Room::where('is_active', true)->count();
        $inactive = Room::where('is_active', false)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Rooms',
                    'data' => [$available, $inactive],
                    'backgroundColor' => ['#22c55e', '#ef4444'],
                ],
            ],
            'labels' => ['Active / Available', 'Inactive'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}