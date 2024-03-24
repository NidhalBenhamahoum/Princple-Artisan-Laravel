<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function checkLogin(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required','string','min:8']
        ]);
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('home');

        }else{
            return back()->withInput(['email' => $request->email])->with('erreurTT','Email Not found or error password');
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
}
