<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Standard-Einstellungen für LoginDemo
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards: Wer darf rein?
    |--------------------------------------------------------------------------
    | Hier nutzen wir 'web', was auf Sessions basiert. Das ist der Standard
    | für unseren Login-Bildschirm.
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provider: Wo kommen die User her?
    |--------------------------------------------------------------------------
    | Wir ziehen die User über Eloquent direkt aus deiner SQLite-Datenbank.
    | Das Model ist dein App\Models\User.
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Passwort-Reset (Falls mal jemand sein PW vergisst)
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout für Passwort-Bestätigungen
    |--------------------------------------------------------------------------
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];