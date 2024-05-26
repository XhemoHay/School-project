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


class UserChart extends ChartWidget
{
    protected static ?string $heading = 'Statistics';

    protected static ?string $maxHeight = '300px';

    protected int | string | array $columnSpan = 'full';

    public ?string $filter = 'month';


    protected function getFilters(): ?array
{
    return [
        'today' => 'Today',
        'week' => 'Last week',
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
            'month' => now()->startOfMonth(),
            'year' => now()->startOfYear(),
            'last_year' => now()->subYear()->startOfYear(), 
            default => now()->startOfWeek(), // Default to 'This year'
        };

        $endDate = match ($this->filter) {
            'today' => now()->endOfDay(),
            'week' => now()->endOfWeek(),
            'month' => now()->endOfMonth(),
            'year' => now()->endOfYear(),
            'last_year' => now()->subYear()->endOfYear(),
            default => now()->endOfWeek(), // Default to 'This year'
        };


        $interval = match ($this->filter) {
            'today' => 'perHour',
            'week' => 'perDay',
            'month' => 'perDay', // You can adjust this to 'perMonth' if needed
            'year' => 'perMonth', // You can adjust this to 'perYear' if needed
            'last_year' => 'perMonth', 
            default => 'perDay', // Default to 'perMonth'
        };


        $data = Trend::model(Prayer::class)
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();

        $data2 = Trend::model(Problem::class)
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();
        
        $data3 = Trend::query(Prayer::where('salah', 'like', 'Sabah'))
            ->between(start: $startDate, end: $endDate)
            ->{$interval}()
            ->count();
 
            return [
                'datasets' => [            
                    [
                        'label' => 'Namaz',
                        'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 99, 132, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 99, 132, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Izjave',
                        'data' => $data2->map(fn (TrendValue $value) => $value->aggregate),
                        'backgroundColor' => 'rgba(255, 29, 125, 0.6)', // Adjust as needed
                        'borderColor' => 'rgba(255, 55, 182, 1)', 
                        'lineTension' => 0.3,
                
                    ],
                    [
                        'label' => 'Sabah',
                        'data' => $data3->map(fn (TrendValue $value) => $value->aggregate),
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
