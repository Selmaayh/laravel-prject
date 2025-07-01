@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="mb-5 text-center">Tableau de bord Administrateur</h1>

<div class="row mb-4">
    <!-- Utilisateurs -->
    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Utilisateurs</h5>
                        <small class="text-muted">{{ $users->count() }} au total</small>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($users as $user)
                        <li class="list-group-item">{{ $user->name }} <br><small class="text-muted">{{ $user->email }}</small></li>
                    @empty
                        <li class="list-group-item text-muted">Aucun utilisateur</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Projets -->
    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                        <i class="bi bi-kanban-fill"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Projets</h5>
                        <small class="text-muted">{{ $projects->count() }} projets actifs</small>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($projects as $project)
                        <li class="list-group-item">{{ $project->name }}</li>
                    @empty
                        <li class="list-group-item text-muted">Aucun projet</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Tâches -->
    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-info text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px;">
                        <i class="bi bi-check2-square"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Tâches</h5>
                        <small class="text-muted">{{ $tasks->count() }} en cours</small>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    
                @forelse ($tasks as $task)
                <li class="list-group-item">
                    {{ $task->name }}
                    <small class="text-muted">Projet: {{ $task->project->name }}</small>
                </li>
@empty
    <li class="list-group-item text-muted">Aucune tâche</li>
@endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
