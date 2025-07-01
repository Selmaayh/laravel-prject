@extends('layouts.admin')

@section('title', 'Tâches')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"><i class="bi bi-list-check me-2"></i>Liste des tâches</h1>
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Ajouter une tâche
        </a>
    </div>

    @if($tasks->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60%">Titre</th>
                        <th style="width: 40%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    
                        <tr>
                            <td class="fw-semibold">{{ $task->title }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </a>

                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST"
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3-fill"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <p>Aucune tâche enregistrée pour le moment.</p>
        </div>
    @endif
@endsection
