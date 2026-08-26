<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MySchoolController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolsController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/login', [LoginController::class, 'index'])->name('auth.index');
Route::post('login', [LoginController::class, 'store'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function(){
    Route::resource('dashboard', DashboardController::class);
    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('menus', MenuController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('schools', SchoolsController::class);
        Route::resource('admins', AdminController::class);
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('my-school', MySchoolController::class);
        Route::resource('facilities', FacilitiesController::class);
    });
});
