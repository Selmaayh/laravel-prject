@extends('layouts.admin')

@section('title', 'Connexion Admin')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 420px;">
        <div class="text-center mb-4">
            <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                <i class="bi bi-person-lock" style="font-size: 24px;"></i>
            </div>
            <h4 class="mt-3">Connexion Administrateur</h4>
            <p class="text-muted small">Accédez au panneau de gestion</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="admin@example.com" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</div>
@endsection
