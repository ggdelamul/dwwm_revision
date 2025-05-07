<?php
// Active l'affichage des erreurs en développement
ini_set('display_errors', 1);
/*
Fonction :
Elle demande à PHP d’afficher les erreurs à l’écran au lieu de les cacher.
Détail :
'display_errors' est une directive de configuration de PHP
1 signifie : active (équivalent à "ON")
En production, cette valeur est souvent 0 pour ne pas afficher les erreurs aux visiteurs
*/ 
error_reporting(E_ALL);
/*Elle définit quels types d'erreurs PHP doit rapporter.
Détail :
E_ALL signifie : toutes les erreurs, avertissements, notices, etc.
D’autres niveaux existent (ex : E_ERROR, E_WARNING, E_NOTICE), mais E_ALL est le plus complet
C’est l’option recommandée en phase de développement
 */
// Inclusion manuelle du contrôleur UserController
require_once __DIR__ . '/../controllers/UserController.php';

// Création d'une instance du contrôleur
$controller = new UserController();
// Récupération de l'action depuis l'URL, ex : /?action=index
$action = $_GET['action'] ?? 'index'; // Par défaut : index
// Routage basique : envoie vers les bonnes méthodes du contrôleur
switch ($action) {
    case 'index': // Affiche la liste des utilisateurs
        $controller->index();
        break;
    case 'show':
        // Vérifie qu'on a bien un ID valide passé en GET
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $controller->showWithOneUser($id);
        break;
    // Tu pourras ajouter ici d'autres cas comme :
    case 'create': 
        $controller->createUser(); 
        break;
    case 'add': 
        $controller->addUser(); 
        break;
    case 'delete': 
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $controller->delete($id); 
        break;

    default: // Si l'action n'existe pas, on redirige vers l'index
        $controller->index();
        break;
}
