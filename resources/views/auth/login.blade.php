@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white p-3 text-center">
                    <h4 class="mb-0">Anmelden</h4>
                        <form method="POST" action="{{ route('login') }}" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail-Adresse</label>
                                <input type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Passwort</label>
                                <input type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Anmelden</button>
                        </form>
                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Einloggen
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Link zur Registrierung -->
                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0 text-muted">
                        Noch kein Konto? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Jetzt registrieren</a>
                    </p>
                </div>
            </div>

            <!-- Fehlermeldungen anzeigen, falls Login fehlschlägt -->
            @if ($errors->any())
                <div class="alert alert-danger mt-4 shadow-sm">
                    <h5 class="alert-heading">Da ist was schiefgelaufen!</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 

        </div>
    </div>
</div>
@endsection
