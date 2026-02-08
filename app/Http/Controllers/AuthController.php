<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Zeigt einfach nur das Login-Formular an
    public function showLogin() {
        return view('auth.login');
    }

    // Die eigentliche Login-Logik
    public function login(LoginRequest $request) {
        $daten = $request->validated();

        if (Auth::attempt($daten)) {
            // Session-ID neu machen (Sicherheitsstandard)
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        // Falls was nicht stimmt, mit Fehlermeldung zurück
        return back()->withErrors(['email' => 'Daten passen nicht zusammen.'])->onlyInput('email');
    }

    // Nutzer sicher abmelden
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
