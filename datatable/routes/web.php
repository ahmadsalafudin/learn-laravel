<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', [EmployeeController::class, 'index']);
Route::get('/data', [EmployeeController::class, 'data']);
Route::get('/detail', [EmployeeController::class, 'detail']);
Route::get('/detail-data', [EmployeeController::class, 'detailData']);
