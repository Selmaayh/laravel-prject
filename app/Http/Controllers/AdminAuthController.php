<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Affiche le formulaire d'inscription pour les administrateurs.
     */
    public function showRegister()
    {
        return view('admin.auth.register');
    }

    /**
     * Enregistre un nouvel administrateur avec validation.
     */
    public function register(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Création de l'admin
        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Connexion automatique
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Affiche le formulaire de connexion admin.
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Traite la connexion admin avec validation.
     */
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentative de connexion
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // protection contre fixation de session
            return redirect()->route('admin.dashboard');
        }

        // Échec
        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'administrateur.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
