<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="[https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css](https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css)" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow-sm" style="max-width: 400px;">
            <div class="card-body">
                <h3 class="text-center mb-4">Anmeldung</h3>
                <form action="{{ route('login') }}" method="POST">
                    <!-- Ganz wichtig: Das CSRF-Token von Laravel für die Sicherheit -->
                    @csrf
                    <div class="mb-3">
                        <label>E-Mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        <!-- Falls Laravel Fehler findet, werden die hier ausgegeben -->
                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Passwort</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Einloggen</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>