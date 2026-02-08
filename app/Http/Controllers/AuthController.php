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
}