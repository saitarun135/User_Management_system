<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('sign-in');
});
Route::post('register', [ManagerController::class, 'register']);
Route::post('login-chk', [ManagerController::class, 'login'])->name('user_login');

/**
 * protected by middleware,once it's logged in then only these routes will work.
 */
Route::group(['middleware' => ['isLogged']], function () {
    Route::get('dashboard', [EmployeeController::class, 'dashboard']);
    Route::get('logout', [ManagerController::class, 'logout']);
    Route::post('postemployee', [EmployeeController::class, 'create']);
    Route::get('getData', [EmployeeController::class, 'show']);
    Route::delete('delete/{id}', [EmployeeController::class, 'destroy']);
});
