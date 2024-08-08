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
              $table->string('student_name');
            $table->unsignedBigInteger('teacher_id'); // Ensure this matches the type in the teachers table
            $table->string('class');
            $table->date('admission_date');
            $table->decimal('yearly_fees', 10, 2);
            $table->timestamps();
              $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('cascade');
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
