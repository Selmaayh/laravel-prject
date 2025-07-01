@extends('layouts.admin')

@section('title', 'Créer une tâche')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Créer une tâche</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="due_date" class="form-label">Date d'échéance</label>
                    <input type="date" name="due_date" id="due_date" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Créer</button>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection