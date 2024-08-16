<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'formularioLogin'])->name('user.login');
Route::post('login', [UserController::class, 'login'])->name('user.validar');

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');