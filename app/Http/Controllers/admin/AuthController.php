<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
// ====================================================================================================================

public function register(Request $request){
    //validate request data
    $val = Validator::make($request->all(),[
        'username' => 'required|string|max:191',
        'email' => 'required|email|max:191',
        'password' => 'required|string',
    ]);

    if($val->fails()){
        return response()->json($val->errors());
    }
    $user = Admin::create([
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
    ]);
    $token = $user->createToken($user->email)->plainTextToken;

    $res = [
        'username' => $user->name,
        'email' => $user->email,
        'token' => $token,
    ];
    return response()->json($res, 200);
}

    // Athu From Admin
   public function do_Login(Request $request){
    $data = $request->validate([
        'email' => 'required|email|max:191',
        'password' => 'required|string',
    ]);

    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentication successful, redirect to admin home
        // return redirect()->route('admin.home');
    return "true";
    }

    else {
        // Authentication failed, redirect back with an error message
        // return back()->with('error', 'Invalid email or password.');
        return "false";
    }
}
// logout from admin panel

    // public function logout(){
    //     // auth()->guard('admin')->logout();
    //     //logout() => بتاخد البيانات كلها بتاعت المستخدم تحفها وترجعنا علي صفحة ال لوج ان تاني
    //     // return redirect(route('admin.login'));

    //     auth('sanctum')->guard('admin')->tokens()->delete();

    //     return 'Don';
    // }

    public function Logout(){

        // auth()->guard('admin')->tokens()->Logout();
        auth('sanctum')->guard('admin')->logout();
            // return 'Don';
    }

}
