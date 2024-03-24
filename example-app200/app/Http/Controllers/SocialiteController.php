<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name'=> $user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'social_type'=>'google',
                    'password'=>Hash::make('my-google'),
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function handleFacebookCallback(){
        try{
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name'=> $user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                    'social_type'=>'facebook',
                    'password'=>Hash::make('my-facebook'),
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
