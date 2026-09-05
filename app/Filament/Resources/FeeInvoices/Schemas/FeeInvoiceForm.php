<?php

namespace App\Filament\Resources\FeeInvoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeeInvoiceForm
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
                        Select::make('fee_type_id')
                            ->relationship('feeType', 'name')
                            ->required(),
                        Select::make('academic_year_id')
                            ->relationship('academicYear', 'name')
                            ->required(),
                        TextInput::make('amount')
                            ->required()
                            ->numeric(),
                        TextInput::make('discount')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        TextInput::make('fine')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        DatePicker::make('due_date')
                            ->required(),
                        Select::make('status')
                            ->options(['unpaid' => 'Unpaid', 'partial' => 'Partial', 'paid' => 'Paid', 'waived' => 'Waived'])
                            ->default('unpaid')
                            ->required(),
                        TextInput::make('month'),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }
}
