<?php

namespace App\Filament\Resources\FeeInvoices;

use App\Filament\Resources\FeeInvoices\Pages\CreateFeeInvoice;
use App\Filament\Resources\FeeInvoices\Pages\EditFeeInvoice;
use App\Filament\Resources\FeeInvoices\Pages\ListFeeInvoices;
use App\Filament\Resources\FeeInvoices\Schemas\FeeInvoiceForm;
use App\Filament\Resources\FeeInvoices\Tables\FeeInvoicesTable;
use App\Models\FeeInvoice;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeeInvoiceResource extends Resource
{
    protected static ?string $model = FeeInvoice::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Finance';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return FeeInvoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeeInvoicesTable::configure($table);
    }

    // Sidebar group/parent
    public static function getNavigationGroup(): ?string
    {
        return __('Finance');
    }

    // Sidebar group's/parent's child menu
    public static function getNavigationLabel(): string
    {
        return __('Fee Invoices'); // Shows in Sidebar
    }

    // Shows on "Create" button
    public static function getModelLabel(): string
    {
        return __('Fee Invoice'); // Shows on "Create Role" button
    }

    // Shows as Page Heading
    public static function getPluralModelLabel(): string
    {
        return __('Fee Invoices');
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
            'index' => ListFeeInvoices::route('/'),
            'create' => CreateFeeInvoice::route('/create'),
            'edit' => EditFeeInvoice::route('/{record}/edit'),
        ];
    }
}
