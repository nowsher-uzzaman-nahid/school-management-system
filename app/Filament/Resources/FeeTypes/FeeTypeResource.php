<?php

namespace App\Filament\Resources\FeeTypes;

use App\Filament\Resources\FeeTypes\Pages\CreateFeeType;
use App\Filament\Resources\FeeTypes\Pages\EditFeeType;
use App\Filament\Resources\FeeTypes\Pages\ListFeeTypes;
use App\Filament\Resources\FeeTypes\Schemas\FeeTypeForm;
use App\Filament\Resources\FeeTypes\Tables\FeeTypesTable;
use App\Models\FeeType;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeeTypeResource extends Resource
{
    protected static ?string $model = FeeType::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Finance';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FeeTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeeTypesTable::configure($table);
    }

    // Sidebar group/parent
    public static function getNavigationGroup(): ?string
    {
        return __('Finance');
    }

    // Sidebar group's/parent's child menu
    public static function getNavigationLabel(): string
    {
        return __('Fee Types'); // Shows in Sidebar
    }

    // Shows on "Create" button
    public static function getModelLabel(): string
    {
        return __('Fee Type'); // Shows on "Create Role" button
    }

    // Shows as Page Heading
    public static function getPluralModelLabel(): string
    {
        return __('Fee Types');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeeTypes::route('/'),
            'create' => CreateFeeType::route('/create'),
            'edit' => EditFeeType::route('/{record}/edit'),
        ];
    }
}
