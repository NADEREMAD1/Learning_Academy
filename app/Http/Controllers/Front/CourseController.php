<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function cat($id)
    {

        $data['cat'] = Cat::findOrfail($id);

        $data['courses'] = Courses::where('cat_id', $id)->paginate(3);

        return view("front.courses.Catogry")->with($data);
    }


public function show($id , $c_id){
    $data['course'] = Courses::findOrfail($c_id);

        return view("front.courses.show")->with($data);

}

}
