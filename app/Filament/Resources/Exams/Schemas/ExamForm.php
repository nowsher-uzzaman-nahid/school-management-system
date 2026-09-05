<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('academic_year_id')
                            ->label(__('Academic Year'))
                            ->relationship('academicYear', 'name')
                            ->required(),
                        TextInput::make('name')
                            ->label(__('Exam title'))
                            ->required(),
                        Select::make('type')
                            ->options([
                                'monthly' => __('Monthly'),
                                'mid_term' => __('Mid term'),
                                'final' => __('Final'),
                                'mock' => __('Mock'),
                                'other' => __('Other'),
                            ])
                            ->required(),
                        DatePicker::make('start_date')
                            ->label(__('Start date'))
                            ->required(),
                        DatePicker::make('end_date')
                            ->label(__('End date'))
                            ->required(),
                        Textarea::make('description')
                            ->label(__('Description'))
                            ->columnSpanFull(),
                        Toggle::make('is_published')
                            ->label(__('Published'))
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
            ]);
    }
}
