<?php

namespace App\Filament\Resources\ExamResults;

use App\Filament\Resources\ExamResults\Pages\CreateExamResult;
use App\Filament\Resources\ExamResults\Pages\EditExamResult;
use App\Filament\Resources\ExamResults\Pages\ListExamResults;
use App\Filament\Resources\ExamResults\Schemas\ExamResultForm;
use App\Filament\Resources\ExamResults\Tables\ExamResultsTable;
use App\Models\ExamResult;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExamResultResource extends Resource
{
    protected static ?string $model = ExamResult::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'student.name';

    public static function form(Schema $schema): Schema
    {
        return ExamResultForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamResultsTable::configure($table);
    }

    // Sidebar group/parent
    public static function getNavigationGroup(): ?string
    {
        return __('Examinations');
    }

    // Sidebar group's/parent's child menu
    public static function getNavigationLabel(): string
    {
        return __('Exam Results'); // Shows in Sidebar
    }

    // Shows on "Create" button
    public static function getModelLabel(): string
    {
        return __('Exam Result'); // Shows on "Create Role" button
    }

    // Shows as Page Heading
    public static function getPluralModelLabel(): string
    {
        return __('Exam Results');
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
            'index' => ListExamResults::route('/'),
            'create' => CreateExamResult::route('/create'),
            'edit' => EditExamResult::route('/{record}/edit'),
        ];
    }
}
