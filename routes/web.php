<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login_page');
    Route::get('/register', [AuthController::class, 'marketingRegister'])->name('register_page');

});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/ubah-password', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/atur-pengguna',  [UserController::class, 'manageUserPage'])->name('admin.manageUser');
    
    Route::prefix('/marketing')->group(function(){
        Route::get('/daftar-marketing',  [UserController::class, 'marketingList'])->name('admin.marketing.list');
        Route::get('/permintaan-gabung',  [UserController::class, 'marketingRequest'])->name('admin.marketing.request');
    });
});
