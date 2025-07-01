@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- En-tête --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h1 class="h2 fw-bold text-primary mb-0">
            <i class="fas fa-folder me-2"></i>Mes Projets
        </h1>
        <div class="d-flex gap-2">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                <i class="fas fa-home me-2"></i>Accueil
            </a>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Nouveau Projet
            </a>
        </div>
    </div>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Aucun projet --}}
    @if($projects->isEmpty())
        <div class="card border-0 shadow-sm rounded-4 project-card">
            <div class="card-body text-center py-5">
                <i class="fas fa-folder-open fa-3x icon-muted mb-3"></i>
                <h4 class="text-muted">Aucun projet trouvé</h4>
                <p class="text-muted">Commencez par créer votre premier projet</p>
                <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus-circle me-2"></i>Créer un projet
                </a>
            </div>
        </div>
    @else

        {{-- Liste des projets --}}
        <div class="row g-4">
            @foreach($projects as $project)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 project-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">{{ $project->name }}</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('projects.show', $project) }}">
                                                <i class="fas fa-eye me-2"></i>Voir
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('projects.edit', $project) }}">
                                                <i class="fas fa-edit me-2"></i>Modifier
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fas fa-trash-alt me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <p class="card-text text-muted mb-3">{{ Str::limit($project->description, 150) }}</p>

                            {{-- Liste des tâches --}}
                            @if($project->tasks->isNotEmpty())
                                <ul class="list-group list-group-flush mb-3">
                                    @foreach($project->tasks as $task)
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                            <div>
                                                <i class="fas fa-tasks me-2 text-primary"></i>{{ $task->title }}
                                            </div>
                                            <span class="badge bg-{{ $task->status === 'completed' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($task->status) }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted fst-italic">Aucune tâche pour ce projet.</p>
                            @endif

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $project->created_at->format('d/m/Y') }}
                                </small>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                    Détails <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

{{-- Styles Dark Mode --}}
<style>
    body.dark-mode {
        background-color: #121212;
        color: #f5f5f5;
    }

    .dark-mode .card {
        background-color: #1e1e1e !important;
        color: #f5f5f5;
    }

    .dark-mode .list-group-item {
        background-color: transparent;
        border-color: #444;
        color: #f5f5f5;
    }

    .dark-mode .text-muted,
    .dark-mode .text-secondary {
        color: #bbbbbb !important;
    }

    .dark-mode .btn-light {
        background-color: #333;
        color: #fff;
        border: 1px solid #555;
    }

    .dark-mode .dropdown-menu {
        background-color: #2c2c2c;
        color: #fff;
    }

    .dark-mode .dropdown-item:hover {
        background-color: #444;
    }

    .project-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
