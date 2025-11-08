<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function autenticar(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            return redirect()->route('dashboard');
        }

        return back()->with('erro', 'E-mail ou senha incorretos.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
