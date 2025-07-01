@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- En-tête + Description du projet --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4 border-start border-5 border-primary project-card">
        <div class="card-body d-flex align-items-start gap-3">
            <i class="bi bi-folder-fill text-primary fs-2"></i>
            <div>
                <h2 class="h4 fw-bold text-primary mb-2">{{ $project->name }}</h2>
                <p class="mb-0 text-muted">{{ $project->description }}</p>
            </div>
        </div>
    </div>

    {{-- Boutons --}}
    <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="{{ route('projects.tasks.create', $project->id) }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nouvelle tâche
        </a>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Retour aux projets
        </a>
    </div>

    {{-- Liste des tâches --}}
    @if($project->tasks->count())
        <div class="row g-4">
            @foreach($project->tasks as $task)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 task-card h-100">
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div>
                                <h5 class="fw-semibold">{{ $task->title }}</h5>

                                @if($task->description)
                                    <p class="text-muted">{{ Str::limit($task->description, 100) }}</p>
                                @endif

                                <span class="badge 
                                    @if($task->status === 'done') bg-success 
                                    @elseif($task->status === 'in_progress') bg-warning text-dark 
                                    @else bg-light text-dark 
                                    @endif rounded-pill px-3 py-1">
                                    @switch($task->status)
                                        @case('done') ✅ Terminée @break
                                        @case('in_progress') 🔄 En cours @break
                                        @default ⏳ À faire
                                    @endswitch
                                </span>

                                <small class="text-muted d-block mt-1">Crée le {{ $task->created_at->format('d/m/Y') }}</small>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}"
                                   class="btn btn-sm btn-outline-secondary">Voir</a>
                                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}"
                                   class="btn btn-sm btn-outline-warning">Modifier</a>
                                <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST"
                                      onsubmit="return confirm('Supprimer cette tâche ?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary mt-4">
            <i class="bi bi-info-circle me-2"></i>Aucune tâche n'a encore été créée pour ce projet.
        </div>
    @endif
</div>

{{-- Styles personnalisés avec Dark Mode --}}
<style>
    .task-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .task-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .card p {
        font-size: 0.95rem;
    }

    /* Dark mode overrides */
    body.dark-mode {
        background-color: #121212;
        color: #f5f5f5;
    }

    .dark-mode .project-card,
    .dark-mode .task-card {
        background-color: #1e1e1e !important;
        color: #f5f5f5;
    }

    .dark-mode .text-muted {
        color: #bbbbbb !important;
    }

    .dark-mode .btn-outline-secondary {
        color: #fff;
        border-color: #999;
    }

    .dark-mode .btn-outline-secondary:hover {
        background-color: #ffffff10;
    }

    .dark-mode .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }

    .dark-mode .btn-outline-danger {
        color: #ff6b6b;
        border-color: #ff6b6b;
    }

    .dark-mode .alert-secondary {
        background-color: #2c2c2c;
        border-color: #444;
        color: #ddd;
    }
</style>
@endsection
