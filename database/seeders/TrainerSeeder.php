<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Messages;
use App\Models\NewsLetters;
use App\Models\Setting;
use App\Models\Test;
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
        Cat::create([
            'name'=>'Programming',
        ]);
        Cat::create([
            'name'=>'English',
        ]);
        Cat::create([
            'name'=>'Math',
        ]);
        Test::create([
            'name'=>'nader',
            'spec'=>'nader@gmail.com',
            'desc'=>'nader@gmail.com',
            'img'=>'1.png',
        ]);
        Messages::create([
            'name'=>'nader',
            'email'=>'nader@gmail.com',
            'subject'=>'nader@gmail.com',
            'message'=>'message',
        ]);
        NewsLetters::create([
            'email'=>'email.gmail.com',
        ]);
        Setting::create([
            'name'=>'nader',
            'favicon'=>'favicon.jpg',
            'logo'=>'logo.jpg',
            'city'=>'city',
            'address'=>'address',
            'phone'=>'11111',
            'work_hours'=>'work_hours',
            'email'=>'email.gmail.com',
            'map'=>'map',
            'fb'=>'fb',
            'instagram'=>'instagram',
            'twitter'=>'twitter',
        ]);
    }

}
