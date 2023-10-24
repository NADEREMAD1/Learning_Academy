<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class TrainerController extends Controller
{
  // select Trainer info
public function index()
    {
    // $data['cat'] =  DB::table('cats')->get();

        $data['trainers'] =  Trainer::select('id', 'name','phone','spec','img')->orderBy('id', 'DESC')->get();

        return view('Admin.trainers.index',)->with($data);
}
            // Start Show Table Trainer

public function create()
    {
        return view('admin.trainers.create');
 }
    // End Show Trainer

    // create trainers

 public function store(Request $request){
    $request->validate([
        'name' => 'required|string|max:191',
        'phone' => 'nullable|string|max:20',
        'spec' => 'required|string|max:50',
        'img' => 'required|image|mimes:jpg,jpeg,png',
    ]);

    if ($request->hasFile('img') && $request->file('img')->isValid()) {

        $img = $request->file('img'); // Get the uploaded file

        $img_name = time() . $img->getClientOriginalName();

        $img->move('uplods/trainers/', $img_name);

        $posts = Trainer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'spec' => $request->spec,
            'img' => $img_name,
        ]);

        return redirect(route('admin.trainers.index'));
    } else {
        // Handle the case when no valid file is uploaded
        return back()->with('error', 'Invalid or missing file');
    }
}

    // edit trainers
    public function edit($id)
    {
        $data['trainers'] = Trainer::findOrFail($id);

        return view('admin.trainers.edit')->with($data);
    }

    // Update trainers

    public function update(Request $request)
    {

        $data = $request->validate([

            'name' => 'required|string|max:191',
            'phone' => 'nullable|string|max:20',
            'spec' => 'required|string|max:50',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $old_name = Trainer::findOrFail($request->id)->img;

        if ($request->hasFile('img')) {

            Storage::disk('uplods')->delete('trainers/' . $old_name);
            // لازم اروح علي ملف filesystems واعمل مكان تخذين جديد باسم uplods

            $img = $request->file('img'); // Get the uploaded file

            $img_name = time() . $img->getClientOriginalName();

            $img->move('uplods/trainers/', $img_name);

            $data['img'] = $img_name;

            }else{
                $data['img']=$old_name ;
                }

        Trainer::findOrFail( $request->id)->update($data);

        return redirect(route('admin.trainers.index'));
    }
    // delete trainers

    public function delete($id)
    {
        //  هيمسح صورة الترينر الاول
        $old_name = Trainer::findOrFail($id)->img;

        Storage::disk('uplods')->delete('trainers/' . $old_name);

        //  وبعدين يمسحة من الداتا بيز

        Trainer::findOrFail($id)->delete();

       return back();

    }
}
