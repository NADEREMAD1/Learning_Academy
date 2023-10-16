<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Student;
use App\Models\Test;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

            // select last 3 courses
            $data['courses'] = Courses::select('id','name','small_desc','cat_id','trainer_id','img','price')
            ->orderBy('id','desc')
            ->take(3)
            ->get();

        // statistics
        $data['courses_count'] = Courses::count();
        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();

        $data['tests'] = Test::select('name','spec','desc','img')->get();

        return view('Front/index')->with($data);
    }
}
