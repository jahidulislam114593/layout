<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollController;



// Website Routing
Route::get('/', [websiteController::class, 'home']);
Route::get('/about', [websiteController::class, 'about']);
Route::get('/newarrivals', [websiteController::class, 'newarrivals']);
Route::get('/popularitems', [websiteController::class, 'popularitems']);
Route::get('/allproduct', [websiteController::class, 'allproduct']);


//Admin Routing

Route::get ('admin/login', [authController::class, 'login']);
Route::post ('admin/user-login', [authController::class, 'userLogin']);
Route::get ('admin/teacher-register', [authController::class, 'teacherRegister']);
Route::post ('admin/teacher-registration', [authController::class, 'registrationTeacher']);


Route::get ('admin/student-register', [authController::class, 'studentRegister']);
Route::post ('admin/student-registration', [authController::class, 'registrationStudent']);

Route::middleware(['checkLogin'])->group(function () {
    
    Route::get ('admin/dashboard', [adminController::class, 'dashboard']);
    Route::get ('admin/tables', [adminController::class, 'tables']);
    Route::get ('admin/charts', [adminController::class, 'charts']);
    Route::get ('admin/logout', [authController::class, 'logout']); 
    
  
    Route::middleware(['checkIfAdmin'])->group(function () {
        Route::get ('admin/pending_users', [UserController::class, 'pendingUsers']); 
        Route::get ('admin/approve-user/{userid}', [UserController::class, 'approveUser']);
    });
    Route::middleware(['checkIfStudent'])->group(function () {
        Route::get('admin/student-enroll',[EnrollController::class, 'enroll']);
    });
});