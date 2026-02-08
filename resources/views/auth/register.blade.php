@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <!-- DESIGN-BLOCK: Diese Card-Struktur kannst du später komplett ersetzen -->
            <div class="card shadow-sm border-0">
                
                <div class="card-header bg-dark text-white p-3">
                    <h4 class="mb-0 text-center">Neues Konto erstellen</h4>
                </div>

                <div class="card-body p-4">
                    
                    <!-- LOGIK-KERN: Die Attribute 'method', 'action' und '@csrf' sind Pflicht! -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Eingabegruppe: Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label font-weight-bold">Vollständiger Name</label>
                            <!-- WICHTIG: name="name" muss so bleiben -->
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Max Mustermann"
                                   required 
                                   autofocus>
                        </div>

                        <!-- Eingabegruppe: E-Mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label font-weight-bold">E-Mail-Adresse</label>
                            <!-- WICHTIG: name="email" muss so bleiben -->
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="name@beispiel.de"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                        
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted">format: name@domain.de</small>
                        </div>

                        <!-- Passwort -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Passwort</label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   required>
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <small class="form-text text-muted">Mindestens 8 Zeichen</small>
                        </div>

                        <!-- Passwort bestätigen -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">Passwort wiederholen</label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="form-control" 
                                   required>
                        </div>

                        <!-- DESIGN: Der Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Registrierung abschließen
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- DESIGN: Footer-Link -->
                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0 text-muted">
                        Bereits Mitglied? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Hier anmelden</a>
                    </p>
                </div>
            </div>
            <!-- ENDE DESIGN-BLOCK -->

        </div>
    </div>
</div>
@endsection