<?php

namespace App\Filament\Resources\Notices\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NoticeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        Textarea::make('body')
                            ->label(__('Body'))
                            ->required()
                            ->columnSpanFull(),
                        Select::make('audience')
                            ->options([
                                'all' => 'All',
                                'teachers' => 'Teachers',
                                'students' => 'Students',
                                'guardians' => 'Guardians',
                                'staff' => 'Staff',
                            ])
                            ->required(),
                        Select::make('created_by')
                            ->label(__('Created by'))
                            ->relationship('createdBy', 'name')
                            ->nullable(),
                        DateTimePicker::make('publish_at'),
                        Toggle::make('is_active')
                            ->label(__('Active'))
                            ->helperText('Is the notice still active?')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }
}
