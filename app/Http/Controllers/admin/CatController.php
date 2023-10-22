<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{
public function index(){

    // $data['cat'] =  DB::table('cats')->get();

    $data['cat'] =  Cat::select('id','name')->get();

    return view('Admin.cats.index',)->with($data);
}
}
