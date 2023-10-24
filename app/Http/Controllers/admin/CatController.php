<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{
    public function index()
    {

        // $data['cat'] =  DB::table('cats')->get();

        $data['cat'] =  Cat::select('id', 'name')->orderBy('id', 'DESC')->get();

        return view('Admin.cats.index',)->with($data);
    }

    public function create()
    {
        return view('admin.cats.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required|string|max:20'
        ]);

        Cat::create($data);

        return redirect(route('admin.cats.index'));

    }



    public function edit($id)
    {
        $data['cat'] = Cat::findOrFail($id);

        return view('admin.cats.edit')->with($data);
    }


    public function update(Request $request)
    {

        $data = $request->validate([

            'name' => 'required|string|max:20'
        ]);

        Cat::findOrFail( $request->id)->update($data);

        return redirect(route('admin.cats.index'));

    }

    public function delete($id)
    {
       Cat::findOrFail($id)->delete();
       return back();

    }
}
