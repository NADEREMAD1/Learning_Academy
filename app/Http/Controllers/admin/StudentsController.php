<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
     // select students info
  public function index()
  {
  // $data['cat'] =  DB::table('cats')->get();

      $data['students'] =  Student::select('id', 'name','email','spec')->orderBy('id', 'DESC')->paginate(10);

      return view('admin.students.index')->with($data);
}

// Start Show Table students

public function create()
  {

    $data['students'] = Student::select('id','name')->get();

      return view('Admin.students.create')->with($data);
}
  // End Show students

// create courses
public function store(Request $request){
    $data = $request->validate([
        'name' => 'required|string|max:191',
        'email' => 'required|string|max:191|unique:students',
        'spec' => 'required|string',
    ]);
            $posts = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'spec' => $request->spec,
            ]);

        return redirect(route('admin.students.index'));
  }
    // edit courses
    public function edit($id)
    {

        $data['students'] = Student::findOrFail($id);

        return view('admin.students.edit')->with($data);
    }

  // Update courses
  public function update(Request $request)
  {
      $data = $request->validate([
        'name' => 'required|string|max:191',
        'email' => 'required|email|max:191|unique:students',
        'spec' => 'required|string',
      ]);

      Student::findOrFail( $request->id)->update($data);

      return redirect(route('Admin.students.index'));
  }

  public function delete($id)
  {
      Student::findOrFail($id)->delete();
     return back();
  }

public function showCourses($id) {
    $courses = DB::table('courses')
        ->join('course_student', 'courses.id', '=', 'course_student.course_id')
        ->where('course_student.student_id', $id)
        ->select('courses.id', 'courses.name', 'course_student.status as status')
        ->get();


    return view('admin.students.showCourses', ['courses' => $courses, 'student_id' => $id]);
}

public function approveCourses($id, $c_id) {
    DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
        'status' => 'approve', // استخدم 'approve' بدلاً من 'approved'
    ]);
    return back();
}

public function rejectCourses($id, $c_id) {
    DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
        'status' => 'reject', // استخدم 'reject' بدلاً من 'reject'
    ]);
    return back();
}

public function addToCourse($id){
        $data['student_id'] = $id ;
        $data['courses']= Courses::select('id','name')->get();
    return view('admin.students.addToCourse')->with($data);
}
public function storeCourse($id,Request $request){
    $data = $request->validate([
        'course_id' => 'required|exists:courses,id',
    ]);
        DB::table('course_student')->insert([
            'student_id'=> $id,
            'course_id'=> $data['course_id'],

            ]);
    return redirect(route('admin.students.showCourses',$id));

}
}
