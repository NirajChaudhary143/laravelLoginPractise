<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
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

Route::get('/',[UserLoginController::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/',[UserLoginController::class,'userRegister'])->name('userRegister');
Route::get('/login',[UserLoginController::class,'loginForm'])->name('loginForm')->middleware('alreadyLoggedIn');
Route::post('/login',[UserLoginController::class,'loggedIn'])->name('loggedIn');
Route::get('/dashboard',[UserLoginController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/logout',[UserLoginController::class,'logout'])->name('logout');
