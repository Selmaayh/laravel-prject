@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center ">
    <div class="row w-100" style="max-width: 900px;">
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center bg-primary text-white p-5 rounded-start shadow">
            <h2 class="fw-bold mb-3">Commencez avec Planify</h2>
            <p class="lead">Rejoignez notre plateforme et révolutionnez votre gestion de tâches.</p>
        </div>

        <div class="col-md-6 dark-mode-form p-5 rounded-end shadow">
            <h2 class="mb-4 text-center text-primary fw-bold">Créer un compte</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>

            <div class="mt-4 text-center">
                <p>Déjà un compte ? <a href="{{ route('login') }}" class="text-primary">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
