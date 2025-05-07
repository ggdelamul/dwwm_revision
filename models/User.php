<?php
//namespace App\Models; 
//Inclusion manuelle du fichier de connexion (Singleton)
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../Trait/Log.php';
class User {
    use Logger;
    // Propriété privée contenant l'objet PDO
    private PDO $db;

    // Constructeur : initialise la connexion PDO via la classe Database
    public function __construct() {
        // Appel de la méthode statique get_instance() depuis la classe Database
        $this->db = Database::get_instance()->get_connection();
        $this->log("modèle initialise");
    }

    // Méthode publique pour récupérer tous les utilisateurs de la base
    public function getAll(): array {
        // Exécution de la requête SQL
        $stmt = $this->db->query("SELECT * FROM users");
        // Récupération de tous les résultats sous forme de tableau associatif
        if($stmt){
            $this->log("requete réussi sur table users pour récupérer tout les utilisateurs");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_one_by_id(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
          // Lie la valeur de $id au paramètre :id et exécute la requête
        $stmt->execute(['id' => $id]);

        // Récupère une ligne du résultat sous forme de tableau associatif
        // Si aucun résultat, retourne null grâce à l'opérateur de coalescence
        $data = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        if(is_null($data))
        {
            $this->log("aucun utilisateur à l'id demandé");
            return [];
        } else {
            $this->log("utilisateur à l'id demandé");
            return $data;
        }  
    }

    public function create(array $data): bool
    {
    // Prépare la requête d'insertion avec des paramètres nommés
    $stmt = $this->db->prepare("
        INSERT INTO users (nom, prenom, email, age, biographie)
        VALUES (:nom, :prenom, :email, :age, :biographie)
    ");

    // Exécute la requête avec les données du tableau associatif
    return $stmt->execute([
        'nom'        => $data['nom'],
        'prenom'     => $data['prenom'],
        'email'      => $data['email'],
        'age'        => $data['age'],
        'biographie' => $data['biographie']
    ]);
    }

    public function delete(int $id) :bool
    {
    // Prépare une requête SQL sécurisée pour supprimer un utilisateur selon son ID
    $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");

    // Exécute la requête avec le paramètre fourni
    return $stmt->execute(['id' => $id]);
    }
} 
