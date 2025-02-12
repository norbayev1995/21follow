<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('users.index');
    })->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/follows/{id}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollows/{id}', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('notifications/{id}', [NotificationController::class, 'read'])->name('notifications.read');

});

Route::get('loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
