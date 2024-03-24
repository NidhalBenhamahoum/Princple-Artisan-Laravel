<?php

namespace App\Http\Controllers\artisan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class artisanHomeController extends Controller
{
    public function index(){
        return view('artisan.home');
    }
}
