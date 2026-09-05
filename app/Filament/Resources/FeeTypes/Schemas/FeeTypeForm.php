<?php

namespace App\Filament\Resources\FeeTypes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeeTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('amount')
                            ->required()
                            ->numeric(),
                        Select::make('frequency')
                            ->options([
                                'monthly' => __('Monthly'),
                                'quarterly' => __('Quarterly'),
                                'yearly' => __('Yearly'),
                                'one_time' => __('One time'),
                            ])
                            ->required(),
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
