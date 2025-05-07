<?php
//namespace Config;
//use PDO;
//use PDOException;
require_once __DIR__ .'/../Trait/Log.php';
class Database {
    use Logger;
    // Instance unique de cette classe
    private static ?Database $instance = null;

    // Connexion PDO active
    private PDO $connection;

    // Paramètres de connexion à adapter à ta base
    private string $host = 'localhost';
    private string $dbname = 'bdddwwmdec2';
    private string $username = 'root';
    private string $password = '';
    // Constructeur privé : empêche l'instanciation directe
    private function __construct() {
        try {
            // Construction du DSN (chaîne de connexion)
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            // Création de la connexion PDO
            $this->connection = new PDO($dsn, $this->username, $this->password);
            // Activation des erreurs en mode exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->log("connexion à la base de donnée ");
        } catch (PDOException $e) {
            // En cas d’erreur de connexion, arrêt du script
            die("Erreur de connexion : " . $e->getMessage());
        }
        
    }

    //retourne l'instance unique de la classe
    public static function get_instance(): Database
    {
        if(is_null(Self::$instance))
        {
            Self::$instance = new self();
        }
        return Self::$instance;
    }
    // Retourne l'objet PDO actif
    public function get_connection(): PDO {
        return $this->connection;
    }
}
