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
        // trainers المدرس
        Schema::create('trainers', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('phone')->nullable() ;//// قيمة فارغة (NULL)
            $table->string('spec');
            $table->string('img'); // بنخزن اسمها بس ف الدتا بيز لاكن بنخزنها هي جوا فولد ال public

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
