<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/login', [AuthController::class, 'index'])->name('login');
Route::post('/check-login', [AuthController::class,'login'])->name('checkLogin');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('users', UsersController::class);
        Route::resource('accounts', AccountController::class);
    });
});




    
