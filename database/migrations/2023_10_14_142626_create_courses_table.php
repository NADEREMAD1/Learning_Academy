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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id'); // معرف الفئة
            $table->foreign('cat_id')->references('id')->on('cats')->onDelete('cascade'); // مفتاح خارجي يرتبط بجدول الفئات

            $table->unsignedBigInteger('trainer_id'); // معرف المدرب
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade'); // مفتاح خارجي يرتبط بجدول المدربين

            $table->string('name'); // الاسم باللغه ال
            $table->string('small_desc'); // وصف قصير للعنصر
            $table->text('desc'); // وصف طويل للعنصر
            $table->integer('price'); // سعر العنصر
            $table->string('img'); // اسم الملف للصورة (يتم تخزين الملف الفعلي في مجلد العام مثل public)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
