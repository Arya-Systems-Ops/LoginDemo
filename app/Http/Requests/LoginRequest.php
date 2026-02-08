<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest // KORREKTUR: Muss LoginRequest heißen!
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'email'    => 'required|email:filter', // E-Mail-Anforderung
            'password' => 'required|string|min:8', // 8-Zeichen-Anforderung
        ];
    }

    public function messages(): array   
    {
        return [
            'email.required'    => 'Wir benötigen deine E-Mail-Adresse für den Login.',
            'email.email'       => 'Die E-Mail-Adresse ist ungültig. Sie muss ein @ und eine Domain enthalten (z.B. test@example.de).',
            'password.required' => 'Das Passwort-Feld darf nicht leer sein.',
            'password.min'      => 'Dein Passwort muss aus Sicherheitsgründen mindestens 8 Zeichen lang sein.',
        ];
    }
}