<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesStudentTable extends Migration
{
    public function up()
    {
        Schema::create('courses_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses_student');
    }
}
