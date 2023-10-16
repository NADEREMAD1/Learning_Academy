<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CorsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {

            for ($j = 1; $j <= 6; $j++) {
                Courses::create([

                'cat_id'=>$i,

                'trainer_id'=>rand(1,5),

                'name'=>"courses num $j Cat num $j",

                'small_desc'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ",

                'desc'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",

                'price'=>rand(1000,5000),

                'img'=>"$i$j.jpg",

                ]);
            }
        }
    }
}
