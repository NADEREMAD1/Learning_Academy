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
        Schema::create('course_student', function (Blueprint $table) {

            // course_student -> بياخد ال فورن كي من الكورس والفورن كي من الاستيودينت
            $table->id();

            $table->unsignedBigInteger('course_id'); // معرف الدورة التعليمية المشترك بها الطالب
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade'); // يرتبط بجدول الدورات

             $table->unsignedBigInteger('student_id'); // معرف الطالب المشترك في الدورة
             $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); // يرتبط بجدول الطلاب

             $table->enum('status', ['pending', 'approve', 'reject'])->default('pending')->change();  // حقل يحتوي على قيم محددة (الموافقة أو الرفض)

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
