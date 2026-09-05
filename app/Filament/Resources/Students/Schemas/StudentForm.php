<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECTION 1: Handles the 'User' model
                Section::make('Account Information')
                    ->description('Create or edit the login credentials for this teacher.')
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

                // SECTION 2: Handles the 'Student' model
                Section::make('Student Profile')
                    ->description('Professional and employment details.')
                    ->schema([
                        TextInput::make('admission_no')
                            ->required(),

                        DatePicker::make('date_of_birth')
                            ->required(),

                        Select::make('gender')
                            ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'])
                            ->required(),

                        TextInput::make('blood_group'),

                        Textarea::make('address')
                            ->columnSpanFull(),

                        TextInput::make('phone')
                            ->tel(),

                        FileUpload::make('photo')
                            ->image()
                            ->disk('public')
                            ->directory('student-photos') // Optional
                            ->visibility('public')
                            ->imageEditor() // Optional: allows users to crop/rotate
                            ->maxSize(1024) // Optional: limits to 1MB
                            ->nullable(),

                        Select::make('class_id')
                            ->relationship('class', 'name'),

                        Select::make('guardian_id')
                            ->relationship('guardian', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload(),

                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'graduated' => 'Graduated',
                                'expelled' => 'Expelled',
                            ])
                            ->default('active')
                            ->required(),
                        DatePicker::make('admission_date')
                            ->required(),
                    ])->columns(2)
                    
                
            ]);
    }
}
