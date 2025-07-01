<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand i {
            margin-right: 6px;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        footer {
            background: linear-gradient(90deg, #212529, #343a40);
        }

        footer p {
            margin-bottom: 0;
        }

        footer .footer-icons i {
            margin: 0 8px;
            font-size: 18px;
            color: #adb5bd;
            transition: color 0.3s;
        }

        footer .footer-icons i:hover {
            color: #ffffff;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Header amélioré -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-shield-lock-fill"></i> Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}"><i class="bi bi-kanban-fill"></i> Projets</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.tasks.index') }}"><i class="bi bi-list-check"></i> Tâches</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}"><i class="bi bi-people-fill"></i> Utilisateurs</a></li>
                </ul>
                <form class="d-flex" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-box-arrow-right"></i> Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer amélioré -->
    <footer class="text-light text-center py-4 mt-5">
        <div class="container">
            <div class="mb-2 footer-icons">
                <a href="#"><i class="bi bi-envelope-fill"></i></a>
                <a href="#"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
            <p>&copy; {{ date('Y') }} AdminPanel. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>
