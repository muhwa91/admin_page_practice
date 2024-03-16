<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;

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

// ### User ###
// User Login
Route::middleware('userValidation')->prefix('login')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', [UserAuthController::class, 'userLogin'])->name('userLogin');
});

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
// Route::middleware('adminValidation')->prefix('admin/register')->group(function() {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::post('/', [AdminRegisterController::class, 'adminRegister'])->name('adminRegister');
// });

// Admin index
Route::get('/admin/index', function () {
    return view('welcome');
});

