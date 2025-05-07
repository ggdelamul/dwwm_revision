<?php

// namespace App\Controllers; 
// Inclusion manuelle du modèle User
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../Trait/Log.php';
class UserController {
    // Propriété pour stocker une instance du modèle User
    private User $userModel;
    use Logger;
    // Constructeur : crée une instance du modèle User
    public function __construct() {
        // Le modèle se charge de la connexion à la base
        $this->userModel = new User();
        $this->log("instanciation du controleur");
    }

    // Action : affiche la liste des utilisateurs
    public function index() {
        // Appel de la méthode getAll() du modèle
        $users = $this->userModel->getAll();

        // Inclusion de la vue index.php pour afficher les utilisateurs
        require __DIR__ . '/../views/users/index.php';
    }
    //action affiche un utilisateur
    public function showWithOneUser(int $id)
    {
            if ($id <= 0) {
            require __DIR__ . '/../views/errors/introuvable.php';
            return ;//important le return 
            }
            $user = $this->userModel->get_one_by_id($id);
            require __DIR__ . '/../views/users/utilisateur.php';
    }
    //affichage du template pour ajouter un utilisateur 
    public function createUser()
    {
        require __DIR__ . '/../views/users/create_user.php';
    }
    //ajouter utilisateur 
    public function addUser() {
        // Nettoyage et validation des champs
        $nom        = trim($_POST['nom'] ?? '');
        $prenom     = trim($_POST['prenom'] ?? '');
        $email      = trim($_POST['email'] ?? '');
        $age        = isset($_POST['age']) ? (int) $_POST['age'] : null;
        $biographie = trim($_POST['biographie'] ?? '');


        $this->log($nom . 'depuis la methode d\'ajout du controller');
        // Vérification des champs obligatoires
        if ($nom === '' || $prenom === '' || $email === '' || $age === null) {
            echo "Tous les champs obligatoires doivent être remplis.";
            return;
        }

        // Vérifie que l'âge est un entier positif
        if (!is_numeric($age) || $age < 0) {
            echo "L'âge doit être un nombre positif.";
            return;
        }

        // Vérifie que l'email est bien formé
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email invalide.";
            return;
        }

        // Construction des données à passer au modèle
        $data = [
            'nom'        => $nom,
            'prenom'     => $prenom,
            'email'      => $email,
            'age'        => $age,
            'biographie' => $biographie
        ];

        // Appelle la méthode du modèle pour insérer les données
        $success = $this->userModel->create($data);

        if ($success) {
            // Redirection vers la liste après succès
            header('Location: /?action=index');
            exit;
            } else {
            // En cas d'échec d'insertion
            echo "Une erreur est survenue lors de l'ajout.";
        }
    }   
    //supprimer utilisateur 
    public function delete($id)
    {
        $success = $this->userModel->delete($id);

        if ($success) {
            header('Location: /?action=index');
            exit;
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
