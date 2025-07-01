@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 project-form-card">
                <div class="card-header bg-primary text-white text-center rounded-top-4 py-4">
                    <h4 class="mb-0">
                        <i class="fas fa-folder-plus me-2"></i> Nouveau Projet
                    </h4>
                </div>

                <div class="card-body p-5 rounded-bottom-4">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Nom du projet</label>
                            <input type="text" name="name" id="name"
                                   class="form-control form-control-lg rounded-3"
                                   placeholder="Ex : Refonte du site web" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description détaillée</label>
                            <textarea name="description" id="description"
                                      class="form-control form-control-lg rounded-3"
                                      rows="5" placeholder="Décrivez les objectifs du projet ici..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i>Créer le projet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Styles personnalisés Dark Mode --}}
<style>
    .dark-mode .project-form-card {
        background-color: #1e1e1e;
        color: #f5f5f5;
    }

    .dark-mode .form-label {
        color: #dddddd;
    }

    .dark-mode .form-control {
        background-color: #2b2b2b;
        color: #ffffff;
        border-color: #444;
    }

    .dark-mode .form-control::placeholder {
        color: #999999;
    }

    .dark-mode .form-control:focus {
        background-color: #333;
        color: #fff;
        border-color: #777;
        box-shadow: none;
    }
</style>
@endsection
