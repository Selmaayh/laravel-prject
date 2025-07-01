<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    // Formulaire de création de tâche
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function show(Project $project, Task $task): \Illuminate\View\View
    {
        return view('tasks.show', compact('project', 'task'));
    }

    // Enregistrement d'une nouvelle tâche
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $project->tasks()->create($validated);

        return redirect()->route('projects.show', $project)->with('success', 'Tâche ajoutée!');
    }


    // Formulaire d'édition de tâche
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    // Mise à jour de la tâche
    public function update(Request $request, Project $project, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|in:todo,in_progress,done',
            'priority' => 'nullable|in:1,2,3',

        ]);

        $task->update($validated);

        return redirect()->route('projects.show', $project)->with('success', 'Tâche mise à jour!');
    }

    // Suppression de la tâche
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return back()->with('success', 'Tâche supprimée!');
    }



}