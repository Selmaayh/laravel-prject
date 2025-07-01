@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center ">
    <div class="row w-100" style="max-width: 900px;">
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center bg-primary text-white p-5 rounded-start shadow">
            <h2 class="fw-bold mb-3">Bienvenue sur Planify</h2>
            <p class="lead">Connectez-vous pour accéder à votre espace de gestion de tâches intelligent.</p>
        </div>

        <div class="col-md-6 dark-mode-form p-5 rounded-end shadow">
            <h2 class="mb-4 text-center text-primary fw-bold">Connexion</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erreur :</strong> Email ou mot de passe incorrect.
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">Mot de passe oublié ?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>

            <div class="mt-4 text-center">
                <p>Pas encore de compte ? <a href="{{ route('register') }}" class="text-primary">S'inscrire</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
