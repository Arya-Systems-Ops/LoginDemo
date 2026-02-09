@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow-sm border-0">
                <!-- 1. Dunkler Header (wie bei Register) -->
                <div class="card-header bg-dark text-white p-3 text-center">
                    <h4 class="mb-0">Anmelden</h4>
                </div>

                <!-- 2. Weißer Body für die Eingabefelder -->
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail-Adresse</label>
                            <input type="email" 
                                name="email" 
                                id="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}"
                                placeholder="name@beispiel.de">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" 
                                name="password" 
                                id="password" 
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Passwort eingeben">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nur EIN großer blauer Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Einloggen
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- 3. Heller Footer für den Link -->
                <div class="card-footer bg-light text-center py-3 border-0">
                    <p class="mb-0 text-muted">
                        Noch kein Konto? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Jetzt registrieren</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection