<?php

namespace App\Http\Controllers; // Sagt Laravel, wo die Datei im Projekt liegt

// --- DIE WERKZEUGE IMPORTIEREN ---
use App\Http\Requests\LoginRequest; // Türsteher für den Login
use Illuminate\Http\Request;        // Für Standard-Anfragen
use Illuminate\Support\Facades\Auth; // Das Werkzeug für die Anmeldung



class AuthController extends Controller
{
    // --- SCHRITT 2: LOGIN-FORMULAR ANZEIGEN ---
    public function showLogin()
    {
        // Wir zeigen dem Browser das HTML-Blatt 'login.blade.php'
        return view('auth.login');
    }
    // --- SCHRITT 3: LOGIN-ANFRAGE BEARBEITEN ---
    public function login(LoginRequest $request)
    {
        // Der LoginRequest kümmert sich um die Validierung der Daten

        // Wir holen die E-Mail und das Passwort aus der Anfrage
        $credentials = $request->validated();

        // Jetzt versuchen, den Benutzer mit diesen Daten anzumelden
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Sicherheit: Neue Session-ID nach dem Login
            return redirect()->intended('/home'); // Weiterleitung zum Home-Bereich
        }

        // Wenn es nicht klappt, schicken wir ihn zurück zum Login mit einer Fehlermeldung
        return back()->withErrors([
            'email' => 'Die Daten passen leider nicht zusammen. Bitte überprüfe deine E-Mail und dein Passwort.',

        ])->onlyInput('email'); // Damit bleibt die E-Mail im Formular, aber das Passwort wird gelöscht (wegen Sicherheit).

    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public  function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Passwort verschlüsseln
        ]);
        Auth::login($user); // Automatisch einloggen nach Registrierung
        return redirect('/home'); // Weiterleitung zum Home-Bereich

    }

        // --- SCHRITT 6: LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}