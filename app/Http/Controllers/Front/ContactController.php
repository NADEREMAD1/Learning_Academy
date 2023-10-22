<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Messages;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(){

    $data['settings'] = Setting::first();
        return view('Front.contact.index')->with($data);
   }
}

