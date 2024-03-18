<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\UserWithdrawalController;
use App\Http\Controllers\AdminWithdrawalController;
use App\Http\Controllers\AdminUpdateController;
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
// Admin Sidebar Menu
Route::prefix('admin')->group(function() {
    // Admin index
    Route::get('/index', function () {
        return view('welcome');
    });
    Route::get('/auth/user/management', function () {
        return view('welcome');
    });
    Route::get('/auth/management', function () {
        return view('welcome');
    });
    // Admin Logout
    Route::get('/logout', [AdminAuthController::class, 'adminLogout']);
    // Admin Management(User)
    Route::get('/auth/user/management/ul', [ManagementController::class, 'userList']);
    // Admin Management(User Withdrawal)
    Route::post('/auth/user/management', [UserWithdrawalController::class, 'userWithdrawal'])->name('userWithdrawal');
    // Admin Management(Admin)
    Route::get('/auth/management/al', [ManagementController::class, 'adminList']);
    // Admin Management(Admin Withdrawal)
    Route::post('/auth/management/withdrawal', [AdminWithdrawalController::class, 'adminWithdrawal'])->name('adminWithdrawal');
    // Admin Management(Admin Update)
    Route::post('/auth/management/update', [AdminUpdateController::class, 'adminUpdate'])->name('adminUpdate');
    // Admin registration
    Route::get('/registration', function () {
        return view('welcome');
    });    
});

### Survey ###
Route::prefix('survey')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/user', [SurveyController::class, 'surveyListGet']);
    Route::post('/', [SurveyController::class, 'surveyPost'])->name('surveyPost');
});

