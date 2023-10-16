<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trainer::create([
            'name'=>'nader',
            'spec'=>'web Dev',
            'img'=>'1.png',
        ]);

        Trainer::create([
            'name'=>'Emad',
            'spec'=>'Front End',
            'img'=>'2.png',
        ]);

        Trainer::create([
            'name'=>'Adm',
            'spec'=>'dentist',
            'img'=>'3.png',
        ]);

        Trainer::create([
            'name'=>'Sa3d',
            'spec'=>'Doctor',
            'img'=>'4.png',
        ]);

        Trainer::create([
            'name'=>'Pero',
            'spec'=>'English Teacher',
            'img'=>'5.png',
        ]);
    }
}
