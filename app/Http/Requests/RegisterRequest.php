<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    // Hier werden die Texte festgelegt, die du in roter Schrift sehen willst
    public function messages(): array
    {
        return [
            'name.required' => 'Bitte Name in das Feld eingeben.',
            'email.required' => 'Bitte Email in das Feld eingeben.',
            'email.email' => 'Das ist keine gültige Email-Adresse.',
            'email.unique' => 'Diese Email wird bereits verwendet.',
            'password.required' => 'Bitte Passwort in das Feld eingeben.',
            'password.confirmed' => 'Die Passwörter stimmen nicht überein.',
            'password.min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
        ];
    }
}