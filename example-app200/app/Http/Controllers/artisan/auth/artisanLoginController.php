<?php

namespace App\Http\Controllers\artisan\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class artisanLoginController extends Controller
{
    public function login(){
        return view('artisan.auth.login');
    }
    public function checkLogin(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required','string','min:8']
        ]);
        if(Auth::guard('artisan')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('artisan/home');

        }else{
            return back()->withInput(['email' => $request->email])->with('erreurTT','Email Not found or error password');
        }
    }
    public function logout(){
        Auth::guard('artisan')->logout();
        return redirect('artisan/login');
    }
}
