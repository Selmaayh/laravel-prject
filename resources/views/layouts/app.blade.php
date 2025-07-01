<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('/favicon.ico') }}" type="image/svg+xml">

    <title>{{ config('Planify', 'Planify') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
    
    body.dark-mode {
    background-color: #121212 !important;
    color: #f1f1f1 !important;
}

.dark-mode .navbar,
.dark-mode footer {
    background-color: #1f1f1f !important;
    color: #f1f1f1 !important;
}

.dark-mode .card {
    background-color: #2a2a2a;
    color: #f1f1f1;
}

.dark-mode .btn-outline-secondary {
    border-color: #f1f1f1;
    color: #f1f1f1;
}

.dark-mode .btn-outline-secondary:hover {
    background-color: #f1f1f1;
    color: #121212;
}

        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            color: #0d6efd !important;
        }

        .nav-link:hover,
        .navbar a:hover {
            color: #0d6efd !important;
        }

        .btn {
            border-radius: 0.5rem;
        }

        footer {
            font-size: 0.9rem;
        }

        footer a:hover {
            color: #0d6efd !important;
        }

        .footer-icons a {
            transition: color 0.3s ease;
        }
        body.dark-mode {
    background-color: #121212 !important;
    color: #f1f1f1 !important; /* Texte principal en clair */
}

/* Navbar, footer, cards, etc. */
.dark-mode .navbar,
.dark-mode footer,
.dark-mode .card,
.dark-mode .nav-link,
.dark-mode p,
.dark-mode h1, 
.dark-mode h2,
.dark-mode h3,
.dark-mode h4,
.dark-mode h5,
.dark-mode h6,
.dark-mode .btn {
    color: #f1f1f1 !important;
}

/* Boutons et liens au survol */

.dark-mode a:hover {
    color: #0d6efd !important; 
}

/* Placeholder pour les inputs */
.dark-mode input::placeholder,
.dark-mode textarea::placeholder {
    color: #ccc;
}
/* Active uniquement en dark mode */
.dark-mode .auth-container {
    background-color: #1e1e1e !important;  /* Fond sombre */
    color: #ffffff !important;            /* Texte blanc */
}

/* Pour les inputs et les boutons dans le formulaire */
.dark-mode .auth-container input,
.dark-mode .auth-container textarea {
    background-color: #2c2c2c !important;
    color: #fff !important;
    border-color: #444 !important;
}

.dark-mode .auth-container input::placeholder {
    color: #aaa;
}
/* Pour forcer le fond du formulaire à s'adapter */
.dark-mode .dark-mode-form {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
}

/* Corrige les titres, textes et liens dans le form */
.dark-mode .dark-mode-form h2,
.dark-mode .dark-mode-form label,
.dark-mode .dark-mode-form p,
.dark-mode .dark-mode-form a {
    color: #ffffff !important;
}

/* Pour corriger les champs input */
.dark-mode .dark-mode-form input {
    background-color: #2c2c2c !important;
    color: #ffffff !important;
    border: 1px solid #555 !important;
}

/* Placeholder */
.dark-mode .dark-mode-form input::placeholder {
    color: #cccccc !important;
}


</style>
</head>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const body = document.body;
        const toggleButton = document.getElementById('toggle-dark-mode');
        const themeIcon = document.getElementById('theme-icon');

        if (!toggleButton || !themeIcon) return;

        // Applique le thème sauvegardé
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        }

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            themeIcon.classList.replace(isDark ? 'fa-moon' : 'fa-sun', isDark ? 'fa-sun' : 'fa-moon');
        });
    });
</script>



<body class="d-flex flex-column min-vh-100 bg-light">
    
   

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="/">Planify</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="ms-auto d-flex align-items-center gap-3">
                @auth
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt me-1"></i>Tableau de bord
                    </a>

                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-user-circle me-1"></i>Mon Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt me-1"></i>Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-1"></i>Inscription
                    </a>
                @endguest
                <button id="toggle-dark-mode" class="btn btn-outline-secondary ms-3" title="Changer de thème">
    <i class="fas fa-moon" id="theme-icon"></i>
</button>
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="flex-grow-1 py-4 container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <div class="footer-icons d-flex justify-content-center mb-3">
                <a href="#" class="text-dark mx-3"><i class="fab fa-linkedin-in fa-lg"></i></a>
                <a href="#" class="text-dark mx-3"><i class="fab fa-github fa-lg"></i></a>
            </div>
            <p class="text-muted mb-1">
                &copy; {{ date('Y') }} <strong>Planify</strong>. Made with <i class="fas fa-heart text-danger"></i> by Selma YAHIAOUI
            </p>
            <!-- <p>
                <a href="#" class="text-decoration-none text-muted">Mentions légales</a> | 
                <a href="#" class="text-decoration-none text-muted">Contact</a>
            </p> -->
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
