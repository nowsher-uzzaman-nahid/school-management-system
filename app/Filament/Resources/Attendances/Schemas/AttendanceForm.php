<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('student_id')
                            ->relationship('student', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('class_id')
                            ->relationship('class', 'name')
                            ->required(),
                        DatePicker::make('date')
                            ->required(),
                        Select::make('status')
                            ->options(['present' => 'Present', 'absent' => 'Absent', 'late' => 'Late', 'excused' => 'Excused'])
                            ->default('present')
                            ->required(),
                        TextInput::make('remarks'),
                        Select::make('teacher_id')
                            ->label('Marked by')
                            ->relationship('markedBy', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ])
                    ->columnSpanFull()
                    ->columns(2)
            ]);
    }
}
