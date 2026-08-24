<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MasterMapelController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MySchoolController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SchoolGalleryController;
use App\Http\Controllers\SchoolMajorController;
use App\Http\Controllers\SchoolMapelController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('auth.index');
Route::post('login', [LoginController::class, 'store'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function(){
    Route::resource('dashboard', DashboardController::class);
    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('menus', MenuController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('schools', SchoolsController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('mapels', MasterMapelController::class);
        Route::resource('majors', MajorController::class);
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('my-school', MySchoolController::class);
        Route::get('my-school/cities/{provinceId}', [MySchoolController::class, 'cities'])->name('my-school.cities');
        Route::get('my-school/districts/{cityId}', [MySchoolController::class, 'districts'])->name('my-school.districts');
        Route::get('my-school/villages/{districtId}', [MySchoolController::class, 'villages'])->name('my-school.villages');
        Route::resource('facilities', FacilitiesController::class);
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('galleries', SchoolGalleryController::class);
        Route::resource('school_mapel', SchoolMapelController::class);
        Route::resource('school_majors', SchoolMajorController::class);
    });
});