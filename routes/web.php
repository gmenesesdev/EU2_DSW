<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/registro', [AuthController::class, 'register'])->name('registro');
Route::post('/inicio-sesion', [AuthController::class, 'login'])->name('inicio-sesion');

Route::middleware('auth.jwt')->group(function () {
    Route::get('/proyectos', [ProjectController::class, 'index']);
    Route::post('/proyectos', [ProjectController::class, 'store']);
    Route::get('/proyectos/{id}', [ProjectController::class, 'show']);
    Route::put('/proyectos/{id}', [ProjectController::class, 'update']);
    Route::delete('/proyectos/{id}', [ProjectController::class, 'destroy']);
});

