<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    // protected function afterCreate(): void
    // {
    //     $this->record->user->assignRole('teacher');
    // }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Step 1 — Create the User account manually
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Step 2 — Assign the teacher role
        $user->assignRole('teacher');

        // Step 3 — Inject user_id into the teacher data
        $data['user_id'] = $user->id;

        // Step 4 — Remove the nested user array so Filament
        // does not try to insert it into the teachers table
        unset($data['user']);

        return $data;
    }
}
