<?php


use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Ajout de l'import pour AdminController


// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentification
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// Routes UTILISATEUR protégées (nécessitent une connexion utilisateur standard - guard 'web')
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Routes pour les Projets
    // Le middleware 'auth' est déjà appliqué par le groupe parent, donc pas besoin de le répéter ici.!
    // Route::middleware('auth')->group(function () { // Supprimé car redondant
    
        // Liste des projets (GET)
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

        // Afficher le formulaire de création (GET)
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

        // Enregistrer un nouveau projet (POST)
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

        // Afficher un projet spécifique (GET)
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

        // Afficher le formulaire d'édition (GET)
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

        // Mettre à jour un projet (PUT/PATCH)
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::patch('/projects/{project}', [ProjectController::class, 'update']);

        // Supprimer un projet (DELETE)
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    // Routes pour les Tâches (imbriquées) / (chaque tâche appartient à un projet spécifique)
    // Le middleware 'auth' est déjà appliqué par le groupe parent.
    Route::prefix('projects/{project}')->group(function () {
        // Afficher le formulaire de création de tâche (GET)
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('projects.tasks.create');

        // Enregistrer une nouvelle tâche (POST)
        Route::post('/tasks', [TaskController::class, 'store'])->name('projects.tasks.store');

        // Afficher le formulaire d'édition de tâche (GET)
        Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('projects.tasks.edit');

        Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('projects.tasks.show');

        // Mettre à jour une tâche (PUT/PATCH)
        Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('projects.tasks.update');
        Route::patch('/tasks/{task}', [TaskController::class, 'update']);

        // Supprimer une tâche (DELETE)
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');

    });

use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->name('admin.')->group(function () {

    // Protection globale de l’espace admin : empêcher les users connectés
    if (!Auth::guard('web')->check()) {

        Route::middleware('guest:admin')->group(function () {
            Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('register');
            Route::post('/register', [AdminAuthController::class, 'register']);
            Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
            Route::post('/login', [AdminAuthController::class, 'login']);
        });

        Route::middleware('auth:admin')->group(function () {
            Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // USERS
            Route::get('/users', [AdminController::class, 'users'])->name('users.index');
            Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
            Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
            Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
            Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
            Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('users.destroy');

            // PROJECTS
            Route::get('/projects', [AdminController::class, 'projects'])->name('projects.index');
            Route::get('/projects/create', [AdminController::class, 'createProject'])->name('projects.create');
            Route::post('/projects', [AdminController::class, 'storeProject'])->name('projects.store');
            Route::get('/projects/{id}/edit', [AdminController::class, 'editProject'])->name('projects.edit');
            Route::put('/projects/{id}', [AdminController::class, 'updateProject'])->name('projects.update');
            Route::delete('/projects/{id}', [AdminController::class, 'destroyProject'])->name('projects.destroy');

            // TASKS
            Route::get('/tasks', [AdminController::class, 'tasks'])->name('tasks.index');
            Route::get('/tasks/create', [AdminController::class, 'createTask'])->name('tasks.create');
            Route::post('/tasks', [AdminController::class, 'storeTask'])->name('tasks.store');
            Route::get('/tasks/{id}/edit', [AdminController::class, 'editTask'])->name('tasks.edit');
            Route::put('/tasks/{id}', [AdminController::class, 'updateTask'])->name('tasks.update');
            Route::delete('/tasks/{id}', [AdminController::class, 'destroyTask'])->name('tasks.destroy');
        });

    } else {
        // Redirection ou message si un utilisateur (web) tente d'accéder à /admin
        Route::get('/{any?}', function () {
            return redirect()->route('home')->with('error', 'Accès interdit aux utilisateurs.');
        })->where('any', '.*');
    }

});





