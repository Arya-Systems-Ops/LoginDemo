<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | LoginDemo Enterprise</title>
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #004c85 100%);
            --enterprise-blue: #2c3e50;
        }
        body { 
            background: #f4f7f6;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .navbar {
            background: white;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .hero-section {
            background: var(--primary-gradient);
            color: white;
            padding: 60px 0;
            border-radius: 0 0 50px 50px;
            margin-bottom: -50px;
        }
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .stat-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .btn-logout {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <i class="bi bi-shield-lock-fill me-2"></i>LoginDemo <span class="text-dark">von Arya</span>
        </a>
        <div class="d-flex align-items-center">
            <span class="me-3 d-none d-md-inline text-muted small">Angemeldet als: <strong>{{ Auth::user()->name }}</strong></span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Hero Header -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Willkommen im System {{ Auth::user()->name }}</h1>
        <p class="lead opacity-75">Ihre sichere Arbeitsumgebung ist bereit.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card main-card bg-white">
                <div class="row g-0">
                    <!-- Linke Seite: Das GIF / Visual -->
                    <div class="col-md-5 d-none d-md-block bg-light d-flex align-items-center justify-content-center p-4 border-end">
                        <div class="text-center">
                            <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExeGFlMG91N28zZmhieTlwbGU3cnAxNHE1emE0dG45ZWd3c25lOHQ5aSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ytTYwIlbD1FBu/giphy.gif" 
                                 class="img-fluid rounded-4 shadow-sm mb-3" alt="Success">
                            <p class="text-muted small italic">"Erfolg ist kein Zufall."</p>
                        </div>
                    </div>
                    
                    <!-- Rechte Seite: Info & Stats -->
                    <div class="col-md-7 p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="bi bi-person-check-fill text-primary fs-3"></i>
                            </div>
                            <div>
                                <h2 class="h4 mb-0">Hallo, {{ Auth::user()->name }}!</h2>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Status: Aktiv</span>
                            </div>
                        </div>

                        <p class="text-muted mb-4">
                            Sie haben sich erfolgreich authentifiziert.
                        </p>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="p-3 border rounded-3 bg-light">
                                    <div class="small text-muted">Letzter Login</div>
                                    <div class="fw-bold">Heute, {{ date('H:i') }} Uhr</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>