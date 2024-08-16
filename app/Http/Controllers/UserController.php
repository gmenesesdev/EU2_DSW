<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function formularioLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
        return view('user.login');
    }
    public function login(Request $_request)
    {
        $mensajes = [
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser un email válido',
            'password.required' => 'El campo password es obligatorio',
        ];

        $_request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $mensajes);
        echo 'aca';
    }



    //     $credenciales = $_request->only('email', 'password');
    //     var_dump($_request);
    //     if (Auth::attempt($credenciales)) {
    //         // Validar si el usuario está activo
    //         $user = Auth::user();
    //         if (!$user->activo) {
    //             Auth::logout();
    //             return redirect()->route('user.login')->withErrors(['email' => 'El usuario no está activo']);
    //         }
    //         // Autenticación exitosa
    //         $_request->session()->regenerate();
    //         return redirect()->route('user.dashboard');
    //     }
    //     return redirect()->back()->withErrors(['email' => 'Las credenciales no son correctas']);
    // }
}
