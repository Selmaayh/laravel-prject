@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-lg border-0 rounded-4 dark-mode-card">
            <div class="card-header bg-primary text-white text-center rounded-top-4 py-4">
                <h2 class="mb-0"><i class="bi bi-person-circle me-2"></i>Mon Profil</h2>
            </div>
            <div class="card-body p-5">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    {{-- Nom --}}
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold dark-mode-text">Nom</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="form-control form-control-lg rounded-3 dark-mode-input @error('name') is-invalid @enderror"
                            placeholder="Entrez votre nom" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold dark-mode-text">Adresse e-mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="form-control form-control-lg rounded-3 dark-mode-input @error('email') is-invalid @enderror"
                            placeholder="exemple@domaine.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    {{-- Nouveau mot de passe --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold dark-mode-text">
                            Nouveau mot de passe <small class="text-muted"></small>
                        </label>
                        <input type="password" name="password" id="password"
                            class="form-control form-control-lg rounded-3 dark-mode-input @error('password') is-invalid @enderror"
                            placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmation mot de passe --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold dark-mode-text">Confirmer le mot de
                            passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control form-control-lg rounded-3 dark-mode-input" placeholder="********">
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                            <i class="bi bi-save me-2"></i>Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- {{-- Styles dark mode --}}
        <style>
            .dark-mode-card {
                background-color:rgb(255, 255, 255);
                color: #e4e4e4;
            }

            .dark-mode-input {
                background-color: #2c2c2c;
                color: #e4e4e4;
                border: 1px solid #444;
            }

            .dark-mode-input:focus {
                background-color: #2c2c2c;
                color: #fff;
                border-color: #0d6efd;
            }

            .dark-mode-text {
                color: #ccc;
            }
        </style> -->





@endsection