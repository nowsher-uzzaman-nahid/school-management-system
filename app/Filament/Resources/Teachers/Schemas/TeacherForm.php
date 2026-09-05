<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Models\Department;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
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

                // SECTION 2: Handles the 'Teacher' model
                Section::make('Teacher Profile')
                    ->description('Professional and employment details.')
                    ->schema([
                        TextInput::make('employee_id')
                            ->label('Employee ID')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('e.g. TCH-001'),

                        Select::make('department_id')
                            ->label('Department')
                            ->relationship('department', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),

                        TextInput::make('phone')
                            ->tel(),

                        TextInput::make('qualification')
                            ->placeholder('e.g. M.Sc Physics'),

                        DatePicker::make('joined_at')
                            ->label('Joining Date'),
                        
                        Select::make('status')
                            ->options([
                                'active' => 'Active', 
                                'inactive' => 'Inactive', 
                                'on_leave' => 'On leave'
                            ])
                            ->default('active')
                            ->required(),
                    ])->columns(2)
                
            ]);
    }
}
