<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'formularioLogin'])->name('user.login');
Route::post('login', [UserController::class, 'login'])->name('user.validar');

Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('user.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('user.registrar');

Route::get('/backoffice', function () {
    $user = Auth::user();
    if ($user == NULL) {
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesion activa.']);
    }
    return view('backoffice.dashboard', ['user' => $user]);
})->name('backoffice.dashboard');