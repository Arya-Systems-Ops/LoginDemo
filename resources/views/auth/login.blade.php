@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-3 text-center">
                    <h4 class="mb-0">Anmelden</h4>
                </div>

                <div class="card-body p-4">
                    <!-- LOGIK: action muss auf die Login-Route zeigen -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- E-Mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">E-Mail-Adresse</label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   required 
                                   autofocus>
                        </div>

                        <!-- Passwort -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Passwort</label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Einloggen
                            </button>
                        </div>
                    </form>
                </div>
                
                    <div class="card-footer bg-light text-center py-3">
                        <p class="mb-0 text-muted">
                            Noch kein Konto? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Jetzt registrieren</a>
                        </p>
                    </div>
                </div>

                <!-- KORREKTUR: Der Fehler-Block -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-4 shadow-sm">
                        <h5 class="alert-heading">Fehler!</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif <!-- Das @endif gehört ganz nach unten -->

            </div>
        </div>
    </div>
@endsection
