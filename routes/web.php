<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/criar-conta', [UserController::class, 'create'])->name('create-account');
Route::post('/criar-conta', [UserController::class, 'store'])->name('store-account');


Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::middleware(['throttle:login-attempts'])->group(function () {
    Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {

});


Route::get('/esqueceu-senha', function () {
    // return view('login');
})->name('forgot-password');
