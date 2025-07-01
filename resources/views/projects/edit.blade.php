@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white py-4 rounded-top-4">
                    <h4 class="mb-0 text-center">
                        <i class="fas fa-edit me-2"></i> Modifier le projet
                    </h4>
                </div>
                <div class="card-body bg-light p-5">
                    {{-- Affichage des erreurs de validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire de modification --}}
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Nom du projet</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg"
                                   value="{{ old('name', $project->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description détaillée</label>
                            <textarea name="description" id="description" class="form-control form-control-lg"
                                      rows="5" required>{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
