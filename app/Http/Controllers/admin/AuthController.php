<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // show Log in Form
    public function login(){
        return view('Admin.auth.login');
        }
        // show Homepage
        public function index(){
            return view('Admin.index');
    }

    // Athu From Admin
   public function doLogin(Request $request){
    $data = $request->validate([
        'email' => 'required|email|max:191',
        'password' => 'required|string',
    ]);

    if (!auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        // Authentication successful, redirect to admin home
        return back()->with('error', 'Invalid email or password.');
    }
    else {
        // Authentication failed, redirect back with an error message
        return redirect()->route('admin.home');
    }
}

// logout from admin panel
    public function logout(){
        auth()-> guard('admin')->logout();
        //logout() => بتاخد البيانات كلها بتاعت المستخدم تحفها وترجعنا علي صفحة ال لوج ان تاني
        return redirect(route('admin.login'));
    }
}
