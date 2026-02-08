<?php

namespace App\Http\Controllers; // Sagt Laravel, wo die Datei im Projekt liegt

// --- DIE WERKZEUGE IMPORTIEREN ---
use App\Http\Requests\LoginRequest; // Türsteher für den Login
use Illuminate\Http\Request;         // Für Standard-Anfragen
use Illuminate\Support\Facades\Auth; // Das Werkzeug für die Anmeldung
use App\Http\Requests\RegisterRequest; // Türsteher für die Registrierung
use App\Models\User; // Das User-Modell, um neue Benutzer zu erstellen
use Illuminate\Support\Facades\Hash; // Werkzeug zum sicheren Verschlüsseln von Passwörtern

class AuthController extends Controller
{
    // --- SCHRITT 2: LOGIN-FORMULAR ANZEIGEN ---
    public function showLogin()
    {
        // Wir zeigen dem Browser das Blade-Template 'login.blade.php' im Ordner auth
        return view('auth.login');
    }

    // --- SCHRITT 3: LOGIN-ANFRAGE BEARBEITEN ---
    public function login(LoginRequest $request)
    {
        // Der LoginRequest kümmert sich um die Validierung der Daten
        $credentials = $request->validated();

        // Jetzt versuchen, den Benutzer mit diesen Daten anzumelden
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Sicherheit: Neue Session-ID nach dem Login
            return redirect()->intended('/home'); // Weiterleitung zum Home-Bereich
        }

        // Wenn es nicht klappt, schicken wir ihn zurück zum Login mit der geforderten Fehlermeldung
        return back()->withErrors([
            'email' => 'E-Mail oder Passwort falsch.', 
        ])->onlyInput('email'); // E-Mail bleibt im Feld stehen, Passwort wird aus Sicherheitsgründen geleert
    }

    // --- SCHRITT 4: REGISTRIER-FORMULAR ANZEIGEN ---
    public function showRegister()
    {
        return view('auth.register');
    }

    // --- SCHRITT 5: REGISTRIERUNG VERARBEITEN ---
    public function register(RegisterRequest $request)
    {
        $validated= $request->validated(); // Validierung der Daten durch den RegisterRequest

        // Erstellen des neuen Benutzers in der Datenbank
        $user = User::create([
            'name' => $validated['name'], // Name aus den validierten Daten
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Passwort wird hier sicher verschlüsselt
        ]);

        // Automatisch einloggen nach erfolgreicher Registrierung
        Auth::login($user); 

        // Weiterleitung zur geschützten Willkommensseite
        return redirect('/home')->with('success', 'Registrierung erfolgreich! Willkommen an Bord!');
    }

    // --- SCHRITT 6: LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout(); // Abmeldung des Benutzers
        $request->session()->invalidate(); // Session ungültig machen
        $request->session()->regenerateToken(); // CSRF-Token für den nächsten Gast erneuern
        return redirect('/login'); // Zurück zur Login-Seite
    }
}