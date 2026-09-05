<?php

namespace App\Filament\Resources\ExamResults\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('exam_id')
                            ->relationship('exam', 'name')
                            ->required(),
                        Select::make('student_id')
                            ->relationship('student', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('subject_id')
                            ->relationship('subject', 'name')
                            ->required(),
                        TextInput::make('marks_obtained')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        TextInput::make('total_marks')
                            ->required()
                            ->numeric()
                            ->default(100.0),
                        TextInput::make('grade'),
                        Textarea::make('remarks')
                            ->columnSpanFull(),
                        Toggle::make('is_published')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }
}
