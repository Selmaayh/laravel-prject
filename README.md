# laravel-prject
# 🗂️ PLANIFY — Gestionnaire de projets et tâches

**PLANIFY** est une application web Laravel permettant de gérer des projets et des tâches de manière simple et intuitive. Ce gestionnaire est conçu pour des utilisateurs indépendants ou des personnes sans compétences techniques, avec une interface claire et accessible.

---

## ✨ Fonctionnalités principales

- 🔐 Authentification utilisateur (inscription / connexion)
- 📁 Création, modification et suppression de projets
- ✅ Ajout, modification et suivi des tâches associées à un projet
- 👁️ Vue d’ensemble pour l’administrateur :
  - Gestion des utilisateurs
  - Gestion globale de tous les projets et tâches
- 📊 Interface utilisateur responsive, claire et agréable
- 🛡️ Sécurité des formulaires (CSRF, validation, middleware)

---

## 🧱 Technologies utilisées

- **Laravel** 10+
- **PHP** 8.2
- **Blade** (templating Laravel)
- **MySQL** 
- **Git/GitHub**

---
👤 Accès administrateur
L’administrateur peut voir et gérer tous les utilisateurs, projets et tâches.

Il dispose d’une interface dédiée (tableau de bord).

L’accès se fait via une URL spécifique (/admin/login ou /admin selon votre configuration).


📂 Structure technique (MVC)
Controllers : Traitement des actions utilisateurs (CRUD, authentification…)

Models : Représentation des entités (User, Task, Project, Category…)

Views : Gabarits Blade pour une séparation propre HTML / PHP

Routes : Définies dans routes/web.php

🛡️ Sécurité
Middleware pour sécuriser les routes (auth / admin)

CSRF intégré sur tous les formulaires

Aucune donnée sensible versionnée (.env ignoré)

📘 Exemple d’utilisation
Se connecter ou s’inscrire

Créer un ou plusieurs projets

Ajouter des tâches aux projets

Suivre l’état des tâches (à faire, en cours, terminées)

L’administrateur peut surveiller toute l’activité


📌 Public cible
Ce projet s’adresse :

aux indépendants souhaitant s’organiser

à des utilisateurs sans compétence technique

à toute personne souhaitant gérer ses tâches personnelles ou professionnelles




