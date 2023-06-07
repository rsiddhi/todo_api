<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\ForgotPasswordController;
use \App\Http\Controllers\Auth\ResetPasswordController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Api\TodoController;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/register', [RegisterController::class,'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/forgot_password', [ForgotPasswordController::class,'create'])->middleware('guest')->name('password.request');
Route::post('/forgot_password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');
Route::get('/reset_password/{token}', [ResetPasswordController::class,'create'])->middleware('guest')->name('password.reset');
Route::post('/reset_password', [ResetPasswordController::class, 'store'])->middleware('guest')->name('password.update');
Route::get('/login', [LoginController::class,'create'])->middleware('guest')->name('login');
//Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/todos', [TodoController::class, 'index']);
