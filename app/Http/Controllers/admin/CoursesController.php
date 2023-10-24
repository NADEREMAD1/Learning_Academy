<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Courses;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
  // select Trainer info
  public function index()
  {
  // $data['cat'] =  DB::table('cats')->get();

      $data['courses'] =  Courses::select('id', 'name','price','img')->orderBy('id', 'DESC')->paginate(10);

      return view('Admin.courses.index',)->with($data);
}

// Start Show Table Trainer

public function create()
  {

    $data['cats'] = Cat::select('id','name')->get();

    $data['trainer'] = Trainer::select('id','name')->get();

      return view('admin.courses.create')->with($data);
}
  // End Show Trainer


// create courses
public function store(Request $request){
  $request->validate([
      'name' => 'required|string|max:191',
      'small_desc' => 'required|string|max:191',
      'desc' => 'required|string',
      'price' => 'required|integer',
      'cat_id' => 'required|exists:cats,id',
      'trainer_id' => 'required|exists:trainers,id',
      'img' => 'required|image|mimes:jpg,jpeg,png',
  ]);

  if ($request->hasFile('img') && $request->file('img')->isValid()) {

      $img = $request->file('img'); // Get the uploaded file

      $img_name = time() . $img->getClientOriginalName();

      $img->move('uplods/corses/', $img_name);

      $posts = Courses::create([
          'name' => $request->name,
          'small_desc' => $request->small_desc,
          'desc' => $request->desc,
          'price' => $request->price,
          'cat_id' => $request->cat_id,
          'trainer_id' => $request->trainer_id,
          'img' => $img_name,
      ]);

      return redirect(route('admin.courses.index'));
  } else {
      // Handle the case when no valid file is uploaded
      return back()->with('error', 'Invalid or missing file');
  }
}

  // edit courses
  public function edit($id)
  {
    $data['cats'] = Cat::select('id','name')->get();

    $data['trainer'] = Trainer::select('id','name')->get();

      $data['course'] = Courses::findOrFail($id);

      return view('admin.courses.edit')->with($data);
  }

  // Update courses
  public function update(Request $request)
  {

      $data = $request->validate([

        'name' => 'required|string|max:191',
        'small_desc' => 'required|string|max:191',
        'desc' => 'required|string',
        'price' => 'required|integer',
        'cat_id' => 'required|exists:cats,id',
        'trainer_id' => 'required|exists:trainers,id',
        'img' => 'nullable|image|mimes:jpg,jpeg,png',
      ]);

      $old_name = Courses::findOrFail($request->id)->img;

      if ($request->hasFile('img')) {

          Storage::disk('uplods')->delete('corses/' . $old_name);

          // لازم اروح علي ملف filesystems واعمل مكان تخذين جديد باسم uplods

          $img = $request->file('img'); // Get the uploaded file

          $img_name = time() . $img->getClientOriginalName();

          $img->move('uplods/corses/', $img_name);

          $data['img'] = $img_name;

          }else{
              $data['img']=$old_name ;
              }

      Courses::findOrFail( $request->id)->update($data);

      return redirect(route('admin.courses.index'));
  }
  // delete courses

  public function delete($id)
  {
      //  هيمسح صورة الترينر الاول
      $old_name = Courses::findOrFail($id)->img;

      Storage::disk('uplods')->delete('corses/' . $old_name);

      //  وبعدين يمسحة من الداتا بيز

      Courses::findOrFail($id)->delete();

     return back();

  }
}
