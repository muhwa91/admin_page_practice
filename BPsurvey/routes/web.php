<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SurveyController;

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
// ### Index ###
Route::get('/', function () {
    return view('welcome');
});

// ### User ###
// User Login
Route::middleware('userValidation')->prefix('login')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', [UserAuthController::class, 'userLogin'])->name('userLogin');
});

// User Logout
Route::get('/logout', [UserAuthController::class, 'userLogout']);

// User Register
Route::middleware('userValidation')->prefix('register')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', [UserRegisterController::class, 'userRegister'])->name('userRegister');
});

// ### Admin ###
// Admin Login
Route::middleware('adminValidation')->prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', [AdminAuthController::class, 'adminLogin'])->name('adminLogin');
});
// Admin Register
Route::middleware('adminValidation')->prefix('admin/index')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', [AdminRegisterController::class, 'adminRegister'])->name('adminRegister');
});

// Admin index
Route::get('/admin/index', function () {
    return view('welcome');
});
// Admin Management(User)
Route::get('/admin/auth/user/management', function () {
    return view('welcome');
});
// Admin Management(Admin)
Route::get('/admin/auth/management', function () {
    return view('welcome');
});
// Admin registration
Route::get('/admin/registration', function () {
    return view('welcome');
});

### Survey ###
Route::prefix('survey')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/user', [SurveyController::class, 'surveyListGet']);
    Route::post('/', [SurveyController::class, 'surveyPost'])->name('surveyPost');
});

