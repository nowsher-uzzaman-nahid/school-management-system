<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subjet Information')
                    ->description('This form stores the necessary subject details. Do not keep the mandatory fields blank.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Subject Title')
                            ->required()
                            ->placeholder('e.g. Physics'),

                        TextInput::make('code')
                            ->required()
                            ->placeholder('e.g. PHY'),

                        Select::make('department_id')
                            ->relationship('department', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->extraAttributes([
                                'style' => 'cursor: pointer;',
                            ]),

                        TextInput::make('credit_hours')
                            ->required()
                            ->numeric()
                            ->default(1),

                        Textarea::make('description')
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }
}
