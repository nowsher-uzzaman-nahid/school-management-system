<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('admission_no')->unique();        // e.g. "STD-2024-001"
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('blood_group')->nullable();       // e.g. "B+"
            $table->text('address')->nullable();
            $table->string('phone')->nullable();             // student's own phone if any
            $table->string('photo')->nullable();             // file path to photo
            $table->foreignId('class_id')
                  ->nullable()
                  ->constrained('classes')
                  ->nullOnDelete();
            $table->foreignId('guardian_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->enum('status', ['active', 'inactive', 'graduated', 'expelled'])->default('active');
            $table->date('admission_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
