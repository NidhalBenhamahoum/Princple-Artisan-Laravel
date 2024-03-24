<?php

use App\Http\Controllers\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AcheterController;
use App\Http\Controllers\ProduitController;

use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\artisan\CommandController;
use App\Http\Controllers\artisan\ArtisanHomeController;
use App\Http\Controllers\admin\auth\adminLoginController;
use App\Http\Controllers\admin\auth\adminRegisterController;
use App\Http\Controllers\artisan\auth\ArtisanLoginController;
use App\Http\Controllers\artisan\auth\artisanRegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes(['verify'=>true]);
Route::get('user/profile',[ProfileController::class,'index'])->name('user.profile');//->middleware('verified');
Route::get('auth/google',[SocialiteController::class,'redirectToGoogle']);
Route::get('auth/google/callback',[SocialiteController::class,'handleGoogleCallback']);

Route::get('auth/facebook',[SocialiteController::class,'redirectToFacebook']);
Route::get('auth/facebook/callback',[SocialiteController::class,'handleFacebookCallback']);
Route::resource('/artisan/produits/',ProduitController::class);
Route::get('/artisan/produits/create',[ProduitController::class,'create']
);

Route::get('/artisan/produits/edit{id}',[ProduitController::class,'edit']
);
Route::post('/artisan/produits/update{id}',[ProduitController::class,'update']
);
Route::get('/artisan/produits/delete{id}',[ProduitController::class,'destroy']
);
Route::get('/artisan/produits/trash',[ProduitController::class,'showTrash']
);
Route::get('/artisan/produits/restore{id}',[ProduitController::class,'restore']
);
Route::get('/artisan/produits/show{id}',[ProduitController::class,'show']
);
Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes(['verify'=>true]);


Route::get('artisan/home',[ArtisanHomeController::class,'index'])->middleware('auth:artisan');

Route::get('artisan/login',[artisanLoginController::class,'login'])->name('artisan.login');
Route::post('artisan/check',[artisanLoginController::class,'checkLogin'])->name('artisan.login');
Route::get('artisan/register',[artisanRegisterController::class,'register'])->name('artisan.register');
Route::post('artisan/store',[artisanRegisterController::class,'store'])->name('artisan.register');
Route::post('artisan/logout',[artisanLoginController::class,'logout'])->name('artisan.logout');

Route::get('role',[Role::class,'tax'])->name('role');

Route::get('admin/home',[adminHomeController::class,'index'])->middleware('auth:admin');
Route::get('admin/login',[adminLoginController::class,'login']);
Route::post('admin/check',[adminLoginController::class,'checkLogin']);
Route::get('admin/register',[adminRegisterController::class,'register']);
Route::post('admin/store',[adminRegisterController::class,'store']);
Route::post('admin/logout',[adminLoginController::class,'logout'])->name('admin.logout');

Route::get('/voir_panier',[PanierController::class,'voir']);
Route::get('/confirm_panier{id}',[PanierController::class,'confirm']);
Route::get('/delete_panier{idf}',[PanierController::class,'delete']);
Route::get('/command_trash',[PanierController::class,'showTrash']);
Route::get('/restore_command{id}',[PanierController::class,'restore']);
Route::get('/PaiementMaintenant{id_command}',[PanierController::class,'Pay_maintenant']);
Route::get('/PaiementPlusTard{id_command}',[PanierController::class,'Pay_tard']);


Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('check',[LoginController::class,'checkLogin'])->name('check');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('store',[RegisterController::class,'store'])->name('store');
Route::post('logout',[LoginController::class,'logout'])->name('logout');

Route::get('/home',[AcheterController::class,'index'])->middleware('auth:web')->name('user.voir_produits');
Route::get('add_produit_command',[AcheterController::class,'add'])->middleware('auth:web')->name('user.voir_produits1');


Route::get('/artisan/command',[CommandController::class,'index']);
Route::get('/artisan/accept{id}',[CommandController::class,'accept']);
Route::get('/artisan/refuse{id}',[CommandController::class,'refuse']);
Route::get('/artisan/livriser{id}',[CommandController::class,'livriser']);

Route::get('/LivriserManual{id}',[CommandController::class,'livrer_manual']);
Route::get('/LivriserAgent{id}',[CommandController::class,'livrer_agent']);
