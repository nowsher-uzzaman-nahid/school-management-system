<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicYear::create([
            'name'       => '2024-2025',
            'start_date' => '2024-01-01',
            'end_date'   => '2024-12-31',
            'is_current' => false,
        ]);

        AcademicYear::create([
            'name'       => '2025-2026',
            'start_date' => '2025-01-01',
            'end_date'   => '2025-12-31',
            'is_current' => true, // this is the active year
        ]);
    }
}
