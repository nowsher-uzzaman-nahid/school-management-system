<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class EditTeacher extends EditRecord
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['name']  = $this->record->user->name;
        $data['email'] = $this->record->user->email;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];

        // Only hash and update password if a new one was provided
        if (filled($data['password'] ?? null)) {
            $userData['password'] = Hash::make($data['password']);
        }
        
        // Update the related user record
        $this->record->user->update($userData);

        // Remove user fields so they don't bleed into the teachers table
        unset($data['name'], $data['email'], $data['password'], $data['password_confirmation']);

        return $data;
    }
}
