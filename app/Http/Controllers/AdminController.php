<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $projects = Project::all();
        $tasks = Task::all();

        return view('admin.dashboard', compact('users', 'projects', 'tasks'));
    }
    
    public function users()
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }

   public function projects(): View
{
    $projects = Project::with('user')->get();
    return view('admin.projects.index', compact('projects'));
}
    

    public function tasks()
    {
        $tasks = Task::all();
        return view('admin.tasks.index', compact('tasks'));
    }
    public function createUser()
    {
        return view('admin.users.create');
    }

 public function storeUser(Request $request)
{
    // Validation
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    // Création de l'utilisateur avec mot de passe hashé
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => \Hash::make($validated['password']),
    ]);

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé.');
}


    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
    }
    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        Project::create($request->all());
        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour.');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }
    public function createTask()
    {
        return view('admin.tasks.create');
    }

    public function storeTask(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        return view('admin.tasks.edit', compact('task'));
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Tâche mise à jour.');
    }

    public function destroyTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Tâche supprimée.');
    }
    public function __construct()
{
    if (Auth::guard('web')->check()) {
        abort(403, 'Accès interdit.');
    }
}
}

