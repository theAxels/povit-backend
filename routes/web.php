<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register_page');

Route::get('/register', [AuthController::class, 'index'])->name('register_page');

Route::post('/register', [AuthController::class, 'register'])->name('register_store');

Route::get('/login', [LoginController::class, 'loginview'])-> name('login');

Route::get('/login',[LoginController::class, 'login']);

