<?php

namespace App\Filament\Resources\Guardians\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GuardianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECTION 1: Handles the 'User' model
                Section::make('Account Information')
                    ->description('Create or edit the login credentials for this guardian.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(
                                table: 'users',
                                column: 'email',
                                ignorable: fn ($record) => $record?->user // Ignore the User record associated with this Teacher
                            ),

                        TextInput::make('password')
                            ->password()
                            // Only required when creating, optional when editing
                            ->required(fn ($livewire) => $livewire instanceof CreateRecord)
                            ->dehydrated(fn ($state) => filled($state))
                            ->revealable(),
                    ])->columns(2),

                // SECTION 2: Handles the 'Guardian' model
                Section::make('Guardian Profile')
                    ->description('Professional and employment details.')
                    ->schema([
                        TextInput::make('phone')
                            ->tel()
                            ->required(),
                        TextInput::make('relation')
                            ->required(),
                        TextInput::make('occupation'),
                        TextInput::make('national_id'),
                        Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2)

                
            ]);
    }
}
