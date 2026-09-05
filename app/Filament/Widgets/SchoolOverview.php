<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Students'), Student::count())
                ->description(__('Active enrollment'))
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),

            Stat::make(__('Total Teachers'), Teacher::count())
                ->description(__('Faculty members'))
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
        ];
    }
}
