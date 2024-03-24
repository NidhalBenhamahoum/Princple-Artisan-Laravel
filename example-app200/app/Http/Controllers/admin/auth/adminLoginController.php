<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class adminLoginController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function checkLogin(Request $request){
        $request->validate([

            'email'=>['required','email'],
            'password'=>['required','string','min:8']
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/home');

        }else{
            return back()->withInput(['email' => $request->email])->with('erreurTT','Email Not found or error password');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
