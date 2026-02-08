<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bitte gib deinen Namen ein.',
            'email.required' => 'Ich brauche deine E-Mail-Adresse für die Anmeldung.',
            'email.email' => 'Das ist keine gültige E-Mail-Adresse. Bitte überprüfe sie noch mal.',
            'email.unique' => 'Diese E-Mail-Adresse ist schon registriert. Versuch es mit einer anderen.',
            'password.required' => 'Gib bitte dein Passwort ein.',
            'password.min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.confirmed' => 'Die Passwörter stimmen nicht überein. Bitte überprüfe sie noch mal.',
        ];
    }
}