<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('home');
});

Route::post('register',[UserController::class,'register']);
Route::get('login',function(){
    return view('sign-in');
});
Route::post('login-chk',[UserController::class,'login'])->name('user_login');

Route::get('dashboard',function(){
    return view('dashboard');
});
