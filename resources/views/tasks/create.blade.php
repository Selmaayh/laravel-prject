@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle tâche pour le projet : {{ $project->name }}</h1>
    
    <form method="POST" action="{{ route('projects.tasks.store', $project) }}">
        @csrf
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Crée la tâche</button>
    </form>
</div>
@endsection