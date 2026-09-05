<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Class Information')
                    ->description('This form stores the necessary class details. Do not keep the mandatory fields blank.')
                    ->schema([
                        Select::make('academic_year_id')
                            ->relationship('academicYear', 'name')
                            ->required(),

                        TextInput::make('name')
                            ->label('Class Title')
                            ->required()
                            ->placeholder('e.g. One'),

                        TextInput::make('section')
                            ->required()
                            ->placeholder('e.g. A'),

                        Select::make('class_teacher_id')
                            ->relationship('classTeacher', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload(),

                        TextInput::make('capacity')
                            ->required()
                            ->numeric()
                            ->default(40),

                        TextInput::make('room')
                            ->label('Room #')
                            ->nullable()
                            ->placeholder('e.g. 5'),

                    ])  
                    ->columns(2)    
                    ->columnSpanFull()
            ]);
    }
}
