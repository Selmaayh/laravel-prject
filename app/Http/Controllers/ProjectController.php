<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Méthode privée pour vérifier que le projet appartient à l'utilisateur connecté
    private function authorizeProject(Project $project)
    {
        if ($project->user_id !== auth()->id()) {
            abort(403, 'Accès interdit');
        }
    }

    // Liste des projets
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    // Formulaire de création
    public function create()
    {
        return view('projects.create');
    }

    // Enregistrement d'un nouveau projet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Project::create($validated + ['user_id' => auth()->id()]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès!');
    }

    // Affichage d'un projet
    public function show(Project $project)
    {
        $this->authorizeProject($project);

        return view('projects.show', compact('project'));
    }

    // Formulaire d'édition
    public function edit(Project $project)
    {
        $this->authorizeProject($project);

        return view('projects.edit', compact('project'));
    }

    // Mise à jour du projet
    public function update(Request $request, Project $project)
    {
        $this->authorizeProject($project);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour!');
    }

    // Suppression du projet
    public function destroy(Project $project)
    {
        $this->authorizeProject($project);

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé!');
    }
}
