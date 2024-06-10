<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Accounts;

class authController extends Controller
{
    public $data = [];
   public function index(){
   
    $this->data['actionForm'] = route('admin.dashboard');
    return view("admin.auth.login", $this->data);
   }
   public function login(Request $request){
    $loginData = $request->only('username', 'password');
    $loginType = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    $credentials = [
        $loginType => $loginData['email'],
        'password' => $loginData['password'],
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
    } else {
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);}
   }
}


