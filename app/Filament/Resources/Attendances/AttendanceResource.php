<?php

namespace App\Filament\Resources\Attendances;

use App\Filament\Resources\Attendances\Pages\CreateAttendance;
use App\Filament\Resources\Attendances\Pages\EditAttendance;
use App\Filament\Resources\Attendances\Pages\ListAttendances;
use App\Filament\Resources\Attendances\Schemas\AttendanceForm;
use App\Filament\Resources\Attendances\Tables\AttendancesTable;
use App\Models\Attendance;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?int $navigationSort = 1;

    // protected static ?string $recordTitleAttribute = 'student.name';
    

    public static function form(Schema $schema): Schema
    {
        return AttendanceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttendancesTable::configure($table);
    }

    // Sidebar group/parent
    public static function getNavigationGroup(): ?string
    {
        return __('Attendance');
    }

    // Sidebar group's/parent's child menu
    public static function getNavigationLabel(): string
    {
        return __('Attendances'); // Shows in Sidebar
    }

    // Shows on "Create" button
    public static function getModelLabel(): string
    {
        return __('Attendance'); // Shows on "Create Role" button
    }

    // Shows as Page Heading
    public static function getPluralModelLabel(): string
    {
        return __('Attendances');
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
            'index' => ListAttendances::route('/'),
            'create' => CreateAttendance::route('/create'),
            'edit' => EditAttendance::route('/{record}/edit'),
        ];
    }
}
