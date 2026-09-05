<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        // $superAdmin = User::create([
        //     'name'     => 'Super Admin',
        //     'email'    => 'superadmin@school.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $superAdmin->assignRole('super_admin');

        // Admin
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@school.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
    }
}
