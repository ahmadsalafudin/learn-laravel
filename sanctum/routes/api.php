<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('products', ProductController::class);
// Public route
Route::post('register', [AuthController::class, 'register']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::post('login', [AuthController::class, 'login']);

// Protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    Route::post('logout', [AuthController::class, 'logout']);
});
