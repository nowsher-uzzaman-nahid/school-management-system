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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')->constrained()->cascadeOnDelete();
            $table->string('name');                         // e.g. "Grade 8"
            $table->string('section');                      // e.g. "A"
            $table->unsignedBigInteger('class_teacher_id')->nullable(); // a teacher
            $table->integer('capacity')->default(40);       // max number of students
            $table->string('room')->nullable();             // classroom room number
            $table->timestamps();

            $table->foreign('class_teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_classes');
    }
};
