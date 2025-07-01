@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-primary">Détails de la tâche</h1>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left"></i> Retour au projet
                </a>
            </div>

            <div class="card border-0 shadow-lg rounded-4 task-detail-card">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="card-title mb-0">{{ $task->title }}</h4>
                </div>

                <div class="card-body">

                    {{-- Description --}}
                    @if($task->description)
                        <div class="mb-4 p-3 rounded description-box">
                            <h5 class="text-muted">Description :</h5>
                            <p class="mb-0">{{ $task->description }}</p>
                        </div>
                    @endif

                    <div class="row">
                        {{-- Colonne gauche --}}
                        <div class="col-md-6">
                            <ul class="list-group mb-4">
                                <li class="list-group-item d-flex justify-content-between align-items-center list-item-dark">
                                    <span class="fw-bold">Projet :</span>
                                    <span class="badge bg-primary rounded-pill">{{ $project->name }}</span>
                                </li>

                                {{-- Statut --}}
                                <li class="list-group-item d-flex justify-content-between align-items-center list-item-dark">
                                    <span class="fw-bold">Statut :</span>
                                    <span class="badge 
                                        @if($task->status === 'done') bg-success 
                                        @elseif($task->status === 'in_progress') bg-warning text-dark 
                                        @else bg-secondary 
                                        @endif rounded-pill">
                                        @switch($task->status)
                                            @case('done') Terminée @break
                                            @case('in_progress') En cours @break
                                            @default À faire
                                        @endswitch
                                    </span>
                                </li>
                            </ul>
                        </div>

                        {{-- Colonne droite --}}
                        <div class="col-md-6">
                            <ul class="list-group">
                                {{-- Priorité --}}
                                <li class="list-group-item d-flex justify-content-between align-items-center list-item-dark">
                                    <span class="fw-bold">Priorité :</span>
                                    <span class="badge 
                                        @if($task->priority == 1) bg-danger 
                                        @elseif($task->priority == 2) bg-warning text-dark 
                                        @else bg-info text-dark 
                                        @endif rounded-pill">
                                        @switch($task->priority)
                                            @case(1) Haute @break
                                            @case(2) Moyenne @break
                                            @default Basse
                                        @endswitch
                                    </span>
                                </li>

                                {{-- Date de création --}}
                                <li class="list-group-item d-flex justify-content-between align-items-center list-item-dark">
                                    <span class="fw-bold">Crée le :</span>
                                    <span>{{ $task->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Boutons --}}
                <div class="card-footer bg-transparent border-top-0 d-flex justify-content-end gap-2 rounded-bottom-4">
                    <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Modifier
                    </a>

                    <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Styles personnalisés Dark Mode --}}
<style>
    /* Fichier : public/css/darkmode-cards.css */

/* Card projet - mode clair (par défaut) */
.task-detail-card {
    background-color: #fff;
    color: #212529;
    border-radius: 0.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.description-box {
    background-color: #f8f9fa;
    color: #212529;
    border-radius: 0.5rem;
    padding: 1rem;
}

.list-item-dark {
    background-color: #fff;
    color: #212529;
    border-color: #dee2e6;
}

/* Card projet - mode sombre */
body.dark-mode .task-detail-card {
    background-color: #2a2a2a;
    color: #f1f1f1;
    box-shadow: none;
}

body.dark-mode .description-box {
    background-color: #3a3a3a;
    color: #ddd;
}

body.dark-mode .list-item-dark {
    background-color: #2f2f2f;
    color: #ddd;
    border-color: #555;
}

/* Pour que les badges aussi soient visibles en sombre */
body.dark-mode .badge {
    color: #f1f1f1;
}

/* Boutons et liens dans la card */
body.dark-mode .btn-warning {
    background-color: #ffc107;
    color: #212529;
    border: none;
}

body.dark-mode .btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
}

</style>
@endsection
