<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\NewsLetters;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    // News Letter Footer
    public function newsletter(Request $request){

        $data = $request->validate([
            'email' => ['required', 'string']
        ]);
        NewsLetters::create($data);

        return back();

    }
    // contact Form
    public function contactMessage(Request $request){

        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Messages::create($data);
        return back();

    }


    // enroll Courses
    public function enroll(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'spec' => 'required|string|max:191',
            'course_id' =>'required|string|exists:courses,id',
            // exists:courses,id' => id موجود ف جدول الكورس ف عمود ال
        ]);
       $student = Student::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'spec'=>$data['spec'],
       ]);

       $student_id = $student->id;
        DB::table('course_student')->insert([

            'course_id' =>$data['course_id'],
            'student_id' =>$student_id,

            'created_at'=>now(),
            'updated_at'=>now(),
            ]);


        return back();

    }


}
