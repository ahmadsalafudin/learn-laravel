<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;

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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('role:user');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('role:admin');
Route::get('/login', [Auth\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [Auth\LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
