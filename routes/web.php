<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('auth.index');
Route::post('login', [LoginController::class, 'store'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function(){
    Route::resource('dashboard', DashboardController::class);

    
});

Route::get('/roles/index', function () {
    return view('roles.index');
});