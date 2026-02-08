<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Willkommen | LoginDemo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand">LoginDemo Projekt</span>
            
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Abmelden
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container">
        <div class="bg-white p-5 rounded border shadow-sm">
            
            @auth
                <h1>Hallo {{ Auth::user()->name }}!</h1>
                <p class="lead">Schön, dass du da bist. Der Login war erfolgreich.</p>
            @else
                <h1>Willkommen</h1>
                <p>Bitte logge dich ein, um den geschützten Bereich zu sehen.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Zum Login</a>
            @endauth

        </div>
    </div>

</body>
</html>