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
            'email.email'       => 'Bitte gib eine gültige E-Mail-Adresse ein.',
            'password.required' => 'Passwort ist erforderlich, um dich einzuloggen.',
            'password.min'      => 'Dein Passwort muss aus Sicherheitsgründen mindestens 8 Zeichen lang sein.',
        ];
    }
}