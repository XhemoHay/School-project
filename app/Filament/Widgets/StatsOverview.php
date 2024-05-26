<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\User;
use App\Models\Course;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total number of Students', Student::count())->color('success')->chart([7,8,31,4,25]),
            Stat::make('No. of Classes', Course::count())->color('danger')->chart([7,8,31,4,25]),
            Stat::make('No. of Users', User::count())->color('orange')->chart([7,8,31,4,25]),
            Stat::make('Processed', '192.1k')
            ->color('success')
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ]),

        ];
    }
}
