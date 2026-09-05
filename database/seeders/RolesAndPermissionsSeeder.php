<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached roles and permissions before seeding
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            // Academic Years
            'view_academic_years',
            'create_academic_years',
            'edit_academic_years',
            'delete_academic_years',

            // Departments
            'view_departments',
            'create_departments',
            'edit_departments',
            'delete_departments',

            // Teachers
            'view_teachers',
            'create_teachers',
            'edit_teachers',
            'delete_teachers',

            // Subjects
            'view_subjects',
            'create_subjects',
            'edit_subjects',
            'delete_subjects',

            // Classes
            'view_classes',
            'create_classes',
            'edit_classes',
            'delete_classes',

            // Students
            'view_students',
            'create_students',
            'edit_students',
            'delete_students',

            // Guardians
            'view_guardians',
            'create_guardians',
            'edit_guardians',
            'delete_guardians',

            // Attendance
            'view_attendance',
            'create_attendance',
            'edit_attendance',
            'delete_attendance',

            // Exams
            'view_exams',
            'create_exams',
            'edit_exams',
            'delete_exams',

            // Exam Results
            'view_exam_results',
            'create_exam_results',
            'edit_exam_results',
            'delete_exam_results',
            'publish_exam_results',

            // Fees
            'view_fee_types',
            'create_fee_types',
            'edit_fee_types',
            'delete_fee_types',

            'view_fee_invoices',
            'create_fee_invoices',
            'edit_fee_invoices',
            'delete_fee_invoices',

            // Payments
            'view_payments',
            'create_payments',
            'edit_payments',
            'delete_payments',

            // Timetables
            'view_timetables',
            'create_timetables',
            'edit_timetables',
            'delete_timetables',

            // Notices
            'view_notices',
            'create_notices',
            'edit_notices',
            'delete_notices',

            // Users
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // -------------------------------------------------------
        // Create roles and assign permissions
        // -------------------------------------------------------

        // Super Admin — has every permission, no restrictions
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin — can do everything except delete core records
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([
            'view_academic_years', 'create_academic_years', 'edit_academic_years',
            'view_departments', 'create_departments', 'edit_departments',
            'view_teachers', 'create_teachers', 'edit_teachers',
            'view_subjects', 'create_subjects', 'edit_subjects',
            'view_classes', 'create_classes', 'edit_classes',
            'view_students', 'create_students', 'edit_students',
            'view_guardians', 'create_guardians', 'edit_guardians',
            'view_attendance', 'create_attendance', 'edit_attendance',
            'view_exams', 'create_exams', 'edit_exams',
            'view_exam_results', 'create_exam_results', 'edit_exam_results', 'publish_exam_results',
            'view_fee_types', 'create_fee_types', 'edit_fee_types',
            'view_fee_invoices', 'create_fee_invoices', 'edit_fee_invoices',
            'view_payments', 'create_payments', 'edit_payments',
            'view_timetables', 'create_timetables', 'edit_timetables',
            'view_notices', 'create_notices', 'edit_notices',
            'view_users', 'create_users', 'edit_users',
        ]);

        // Teacher — can view students, mark attendance, enter results
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $teacher->givePermissionTo([
            'view_students',
            'view_classes',
            'view_subjects',
            'view_attendance', 'create_attendance', 'edit_attendance',
            'view_exams',
            'view_exam_results', 'create_exam_results', 'edit_exam_results',
            'view_timetables',
            'view_notices',
        ]);

        // Student — read only access to their own data
        $student = Role::firstOrCreate(['name' => 'student']);
        $student->givePermissionTo([
            'view_exam_results',
            'view_attendance',
            'view_timetables',
            'view_notices',
            'view_fee_invoices',
        ]);

        // Guardian — can view their child's data
        $guardian = Role::firstOrCreate(['name' => 'guardian']);
        $guardian->givePermissionTo([
            'view_students',
            'view_exam_results',
            'view_attendance',
            'view_fee_invoices',
            'view_notices',
        ]);
    }
}
