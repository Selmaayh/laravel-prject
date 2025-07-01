@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 task-edit-card">
                <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i> Modifier la tâche : {{ $task->title }}
                    </h4>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('projects.tasks.update', [$project, $task]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Titre --}}
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold dark-mode-text">Titre</label>
                            <input type="text" name="title" value="{{ old('title', $task->title) }}"
                                class="form-control form-control-lg rounded-3" required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold dark-mode-text">Description</label>
                            <textarea name="description" class="form-control form-control-lg rounded-3 dark-mode-input"
                                rows="5" required>{{ old('description', $task->description) }}</textarea>
                        </div>

                        {{-- Statut --}}
                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold dark-mode-text">Statut</label>
                            <select name="status" class="form-select form-select-lg rounded-3 dark-mode-input">
                                <option value="todo" {{ old('status', $task->status) === 'todo' ? 'selected' : '' }}>À faire</option>
                                <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>En cours</option>
                                <option value="done" {{ old('status', $task->status) === 'done' ? 'selected' : '' }}>Terminée</option>
                            </select>
                        </div>

                        {{-- Priorité --}}
                        <div class="mb-4">
                            <label for="priority" class="form-label fw-semibold dark-mode-text">Priorité</label>
                            <select name="priority" class="form-select form-select-lg rounded-3 dark-mode-input">
                                <option value="1" {{ old('priority', $task->priority) == 1 ? 'selected' : '' }}>Haute</option>
                                <option value="2" {{ old('priority', $task->priority) == 2 ? 'selected' : '' }}>Moyenne</option>
                                <option value="3" {{ old('priority', $task->priority) == 3 ? 'selected' : '' }}>Basse</option>
                            </select>
                        </div>

                        {{-- Boutons --}}
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-light">
                                <i class="bi bi-x-lg me-1"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Dark mode styles --}}
<style>
    .task-edit-card {
        background-color: #1e1e1e;
        color: #f5f5f5;
    }

    .dark-mode-input {
        background-color: #2c2c2c;
        color: #eee;
        border: 1px solid #444;
    }

    .dark-mode-input:focus {
        border-color: #0d6efd;
        background-color: #2c2c2c;
        color: #fff;
    }

    .dark-mode-text {
        color: #ccc;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>
@endsection
