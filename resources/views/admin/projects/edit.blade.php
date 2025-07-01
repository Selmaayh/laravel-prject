@extends('layouts.admin')

@section('title', 'Modifier le projet')

@section('content')
    <div class="card">
        <div class="card-header bg-warning">
            <h4>Modifier le projet</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->name) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="4">{{ old('description', $project->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection