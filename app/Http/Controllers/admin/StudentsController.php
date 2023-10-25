<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;


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

  public function showCourses($id){

    $data['course'] = Student::findOrFail($id)->corses;

    return view('admin.students.showCourses')->with($data);

  }

}
