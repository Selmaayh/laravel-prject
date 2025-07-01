<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Le modèle Project représente une entité de projet dans l'application.
 * Il est lié aux utilisateurs (créateur du projet) et aux tâches associées.
 */
class Project extends Model
{
        // Utilisation du trait HasFactory pour permettre la génération de données de test avec les factories

    use HasFactory;
     /**
     * Définition des champs remplissables en masse (mass assignable).
     * Cela permet de sécuriser l'attribution de valeurs lors de la création ou mise à jour d’un projet.
     */
    protected $fillable = [
        'name', 
        'description',
        'user_id' 
    ];



           /**
     * Relation entre le projet et ses tâches.
     * Un projet peut contenir plusieurs tâches.
     *
     */

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


 /**
     * Relation entre le projet et son utilisateur (créateur).
     * Chaque projet appartient à un seul utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */    public function user()
{
    return $this->belongsTo(User::class);
}

}
