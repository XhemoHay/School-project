<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\User;
use App\Models\Student;
use App\Models\Problem;
use App\Models\Prayer;
use Carbon\Carbon;

class PrayerChart extends ChartWidget
{

    protected static ?string $heading = 'Namazi';

    protected static ?string $maxHeight = '300px';

    protected int | string | array $columnSpan = 'full';

    public ?string $filter = 'month';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'This week',
            'last_week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
            'last_year' =>'Last year'
        ];
    }

    protected function getData(): array
    {

        $startDate = match ($this->filter) {
            'today' => now()->startOfDay(),
            'week' => now()->startOfWeek(),
            'last_week' => now()->subWeek()->startOfWeek(),
            'month' => now()->startOfMonth(),
            'year' => now()->startOfYear(),
            'last_year' => now()->subYear()->startOfYear(), 
            default => now()->startOfWeek(), // Default to 'This year'
        };

        $endDate = match ($this->filter) {
            'today' => now()->endOfDay(),
            'week' => now()->endOfWeek(),
            'last_week' => now()->subWeek()->endOfWeek(),
            'month' => now()->endOfMonth(),
            'year' => now()->endOfYear(),
            'last_year' => now()->subYear()->endOfYear(),
            default => now()->endOfWeek(), // Default to 'This year'
        };


        $interval = match ($this->filter) {
            'today' => 'perHour',
            'week' => 'perDay',
            'last_week' => 'perDay',
            'month' => 'perDay', // You can adjust this to 'perMonth' if needed
            'year' => 'perMonth', // You can adjust this to 'perYear' if needed
            'last_year' => 'perMonth', 
            default => 'perDay', // Default to 'perMonth'
        };

        
        $data = Trend::query(Prayer::where('salah', 'like', 'Sabah'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

        $data1 = Trend::query(Prayer::where('salah', 'like', 'Dhuhr'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

        $data2 = Trend::query(Prayer::where('salah', 'like', 'Ikindija'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

        $data3 = Trend::query(Prayer::where('salah', 'like', 'Aksam'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

        $data4 = Trend::query(Prayer::where('salah', 'like', 'Jacija'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

 
            return [
                'datasets' => [            

                    [
                        'label' => 'Sabah',
                        'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 12, 102, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 33, 102, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Dhuhr',
                        'data' => $data1->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 12, 102, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 33, 102, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Ikindija',
                        'data' => $data2->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 12, 102, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 33, 102, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Aksam',
                        'data' => $data3->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 12, 102, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 33, 102, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Jacija',
                        'data' => $data4->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 12, 102, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 33, 102, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                ],
            
                'labels' => $data->map(fn (TrendValue $value) => $value->date),
            ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
