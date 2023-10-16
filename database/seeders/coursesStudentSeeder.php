<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class coursesStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) {

        DB::table('course_student')->insert([
            'course_id' =>rand(3,18),
            'student_id' =>rand(1,40),
            // You can omit 'id' from the insert array to allow the database to generate it.
            'created_at'=>now(),
            'updated_at'=>now(),
            ]);
         }
    }
}
