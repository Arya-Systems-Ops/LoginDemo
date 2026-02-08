<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Startseite</title>
    <link href="[https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css](https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css)" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow-sm" style="max-width: 600px;">
            <div class="card-body text-center">
                <!-- Hier holen wir uns den Namen vom aktuell angemeldeten User -->
                <h1>Hallo, {{ Auth::user()->name }}!</h1>
                <p class="lead">Schön, dass du da bist. Der Login war erfolgreich.</p>

                <!-- Logout muss aus Sicherheitsgründen immer ein POST-Request sein -->
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Abmelden</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>