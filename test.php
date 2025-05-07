<?php 
/*
Étape	Fichier / Dossier	Objectif
1	Structure projet	Organiser le MVC
/mon-crud-mvc/
├── config/               ← Fichiers de configuration (connexion BDD, constantes...)
│   └── Database.php      ← Classe Singleton pour la connexion PDO
│
├── models/               ← Couches métier (interaction directe avec la base)
│   └── User.php          ← Modèle représentant la table `users`
│
├── controllers/          ← Logique métier (gère les requêtes et actions)
│   └── UserController.php ← Contrôleur utilisateur
│
├── views/                ← Présentation (HTML uniquement, sans logique)
│   └── users/            ← Dossier des vues spécifiques à `User`
│       ├── index.php     ← Liste des utilisateurs
│       ├── create.php    ← Formulaire d’ajout
│       └── edit.php      ← Formulaire de modification (plus tard)
│
├── public/               ← Point d’entrée (accessible depuis le navigateur)
│   └── index.php         ← Routeur principal (oriente les requêtes)
│
└── .htaccess             ← (Optionnel) Redirection vers `public/index.php`
2	User.php	Ajouter getAll()

3	Database.php	Connexion PDO
4	UserController.php	Méthode index()
5	index.php (vue)	Affichage des utilisateurs
6	index.php (public)	Routage index
7	create() ctrl	Afficher le formulaire
8	create.php	Formulaire HTML
9	store() ctrl	Gérer le POST
10	create() model	Insérer dans la base
11	Routage store	Ajouter le traitement
*/
// require_once __DIR__ . '/config/Database.php'; // usage sûr et absolu
// require_once __DIR__ . '/models/User.php';
//use Config\Database;
//$pdo = Database::get_instance()->get_connection(); 


// $userClass = new User();
// $data = $userClass->getAll();
// var_dump($data);