<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Science',   'code' => 'SCI'],
            ['name' => 'Arts',      'code' => 'ART'],
            ['name' => 'Commerce',  'code' => 'COM'],
            ['name' => 'Languages', 'code' => 'LAN'],
            ['name' => 'Physical Education', 'code' => 'PHY'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
