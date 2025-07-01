@extends('layouts.admin')

@section('title', 'Modifier la tâche')

@section('content')
    <div class="card">
        <div class="card-header bg-warning">
            <h4>Modifier la tâche</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="4">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="due_date" class="form-label">Date d'échéance</label>
                    <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection