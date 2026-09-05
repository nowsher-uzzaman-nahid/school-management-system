<?php

namespace App\Filament\Resources\AcademicYears\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AcademicYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Year title'))
                            ->placeholder('e.g. 2026-2027')
                            ->required()
                            ->maxLength(20)
                            ->columnSpan(2),
                        DatePicker::make('start_date')
                            ->label(__('Start date'))
                            ->required()
                            ->live(),
                        DatePicker::make('end_date')
                            ->label(__('End date'))
                            ->required()
                            ->after('start_date')
                            ->live(),
                        Toggle::make('is_current')
                            ->label(__('Set as current year'))
                            ->helperText(__('Only one academic year should be current at a time'))
                            ->onColor('success')
                            ->columnSpan(2),
                    ])->columns(2)
            ]);
    }
}
