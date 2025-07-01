@extends('layouts.admin')

@section('title', 'Liste des projets')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"><i class="bi bi-kanban-fill me-2"></i>Liste des projets</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Ajouter un projet
        </a>
    </div>

    @if($projects->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 60%">Titre</th>
                        <th style="width: 40%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td class="fw-semibold">{{ $project->name }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </a>

                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer ce projet ?');">
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
            Aucun projet trouvé pour le moment.
        </div>
    @endif
@endsection
