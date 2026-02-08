<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    
    //Hier lassen wir erst mal jeden durch, da ja jeder zum Login-Formular kommen muss.
    
    public function authorize(): bool
    {
        return true;
    }


    //Hier lege ich die Regeln fest: E-Mail muss gültig sein und das Passwort darf nicht fehlen.

     public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }

    //Das sind die Texte, die der User sieht, wenn er beim Tippen mal was vergisst.

    public function messages(): array
    {
        return [
            'email.required' => 'Ich brauche deine E-Mail-Adresse für die Anmeldung.',
            'email.email' => 'Das ist keine gültige E-Mail-Adresse. Bitte überprüfe sie noch mal.',
            'password.required' => 'Gib bitte dein Passwort ein.',
        ];
    }
}