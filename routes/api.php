<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('welcome', function(){
    return response()->json([
        'success' => true,
        'message' => 'Welcome to API v1 On Pride'
    ]);
});

Route::prefix('auth')->group(function(){
    // Core Authentication
    Route::post('signup', [AuthController::class, 'signUp'])->name('signup');
    Route::post('signin', [AuthController::class, 'signIn'])->name('signin');
    Route::post('signout', [AuthController::class, 'signout'])->middleware('auth:sanctum')->name('signout');
    Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:sanctum')->name('profile');
});

// PR API
// 1. Buat list venue dengan search by nama (first: buat migration, seeder)
// 2. Buat list class event tanpa middleware (first: buat migration, seeder)
// 3. Buat detail class
