<!-- In den <head> Bereich, falls noch nicht drin -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px; border-radius: 15px;">
        <div class="card-header bg-dark text-white text-center py-3" style="border-radius: 15px 15px 0 0;">
            <h4 class="mb-0">Willkommen zurück</h4>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">E-Mail-Adresse</label>
                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="name@beispiel.de" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted">Passwort</label>
                    <input type="password" name="password" class="form-control form-control-lg shadow-sm">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm mb-3">Einloggen</button>
            </form>
            <div class="text-center">
                <span class="text-muted small">Noch kein Konto?</span> 
                <a href="{{ route('register') }}" class="text-decoration-none small fw-bold">Jetzt registrieren</a>
            </div>
        </div>
    </div>
</div>