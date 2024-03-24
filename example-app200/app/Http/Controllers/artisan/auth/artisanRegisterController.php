<?php

namespace App\Http\Controllers\artisan\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Artisan;

class artisanRegisterController extends Controller
{
    public function register(){
        return view('artisan.auth.register');
    }
    public function store(Request $request){
        if($request->password == '123456789'){
            $request->validate([
                'nom'=>['required','string','min:3'],
                'prenom'=>['required','string','min:3'],
                'tel'=>['required','numeric','min:10','unique:artisans'],
                'email'=>['required','email','unique:artisans'],
                'num_artisan'=>['required','numeric','unique:artisans','min:10'],
                'password'=>['required','string','min:8','confirmed'],

            ]);
            $data = $request->except(['password','_token','password_confirmation','num_artisan']);
            $data['password'] = Hash::make($request->password);
            //$data['num_artisan'] = Hash::make($request->num_artisan);
            $data['num_artisan'] = $request->num_artisan;
            Artisan::create($data);
            return redirect('artisan/login');
        }else{
            return back()->with('erreurTT','Somthing Want Wrong');
        }
    }
}
