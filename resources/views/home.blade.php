@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Titre principal -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-dark" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.1);">
            Bienvenue sur <span class="text-primary">Planify</span>
        </h1>
        <p class="lead text-secondary fs-5">
            Votre outil ultime de gestion de projets et de tâches
        </p>


    </div>

    <!-- Cartes des fonctionnalités -->
    <div class="row g-4">
        @foreach([
            [
                'title' => 'Gestion de projets',
                'description' => 'Créez, organisez et suivez facilement vos projets personnels ou professionnels.'
            ],
            [
                'title' => 'Suivi des priorités',
                'description' => 'Classez vos tâches par priorité pour vous concentrer sur ce qui compte vraiment.'
            ],
            [
                'title' => 'Historique des tâches',
                'description' => 'Gardez une trace des tâches accomplies et améliorez votre productivité.'
            ]
        ] as $feature)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow transition">
                    <div class="card-body text-center p-4">
                        <h3 class="mb-3 text-primary">{{ $feature['title'] }}</h3>
                        <p class="text-muted fs-5">{{ $feature['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Actions si connecté -->
    @auth
        <div class="text-center mt-5">
            <a href="{{ route('projects.create') }}" 
               class="btn btn-success btn-lg rounded-pill px-5 me-3 shadow-sm">
               <i class="fas fa-plus-circle me-2"></i> Nouveau projet
            </a>
            <a href="{{ route('projects.index') }}" 
               class="btn btn-outline-success btn-lg rounded-pill px-5 shadow-sm">
               <i class="fas fa-folder-open me-2"></i> Voir les projets
            </a>
        </div>
    @endauth
</div>

<!-- Animation CSS simple pour les cartes -->
<style>
    .hover-shadow {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endsection
