<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * Contrôleur principal responsable de l'affichage de la page d'accueil de l'application.
 * Il fournit des données statiques (features) à la vue pour mettre en avant les fonctionnalités principales.
 */
class HomeController extends Controller
{

     /**
     * Affiche la page d’accueil avec les fonctionnalités principales de l’application.
     *
     * Cette méthode retourne la vue `home` et lui injecte un tableau associatif nommé `features`,
     * contenant les titres et descriptions de trois fonctionnalités : gestion de projets, suivi des tâches et collaboration.
    */
    public function index()
    {
    // Liste des fonctionnalités affichées sur la page d'accueil
        return view('home', [
            
            'features' => [
                [
                    
                    'title' => 'Gestion de projets',
                    'description' => 'Créez et organisez vos projets en toute simplicité'
                ],
                [
                    
                    'title' => 'Suivi des tâches',
                    'description' => 'Suivez l\'avancement de vos tâches quotidiennes'
                ],
                [
                    
                    'title' => 'Collaboration',
                    'description' => 'Partagez vos projets avec votre équipe'
                ]
            ]
        ]);
    }
}