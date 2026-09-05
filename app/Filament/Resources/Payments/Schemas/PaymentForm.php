<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('fee_invoice_id')
                            ->relationship('feeInvoice', 'id')
                            ->required(),
                        TextInput::make('amount_paid')
                            ->required()
                            ->numeric(),
                        DatePicker::make('paid_at')
                            ->required(),
                        Select::make('method')
                            ->options([
                                'cash' => 'Cash',
                                'bank_transfer' => 'Bank transfer',
                                'mobile_banking' => 'Mobile banking',
                                'cheque' => 'Cheque',
                                'other' => 'Other',
                            ])
                            ->required(),
                        TextInput::make('transaction_id'),
                        TextInput::make('received_by')
                            ->nullable(),
                        Textarea::make('notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }
}
