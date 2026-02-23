--- /dev/null
+++ c/Users/proje/Downloads/dwwm_revision-main/dwwm_revision-main/README.md
@@ -0,0 +1,96 @@
+# 📘 Révision POO & Architecture MVC (PHP)
+
+Ce projet est une application **CRUD** (Create, Read, Update, Delete) développée "from scratch" en PHP. Il sert de support pédagogique pour réviser les fondamentaux de la **Programmation Orientée Objet (POO)** et comprendre le fonctionnement d'une architecture **MVC (Modèle-Vue-Contrôleur)** sans utiliser de framework.
+
+## 🎯 Objectifs Pédagogiques
+
+- **Architecture MVC** : Séparation des responsabilités (Routeur -> Contrôleur -> Modèle -> Vue).
+- **POO Avancée** :
+  - Utilisation de **Classes** et **Objets**.
+  - Pattern **Singleton** (pour la connexion Base de Données).
+  - Utilisation de **Traits** (pour le système de Log).
+  - Typage fort (PHP 7.4+).
+- **Base de données** : Interaction via **PDO** et requêtes préparées (Sécurité).
+
+## 📂 Structure du Projet
+
+```text
+/
+├── config/
+│   └── Database.php      # Singleton de connexion PDO
+├── controllers/
+│   └── UserController.php # Logique métier (gestion des utilisateurs)
+├── models/
+│   └── User.php          # Accès aux données (CRUD SQL)
+├── publics/
+│   └── index.php         # Point d'entrée (Routeur)
+├── Trait/
+│   └── Log.php           # Trait pour la gestion des logs (supposé)
+├── views/                # Fichiers HTML (Templates)
+└── script.sql            # Script de création de la BDD
+```
+
+## 🚀 Installation et Configuration
+
+### 1. Base de données
+1. Créez une base de données MySQL (ex: `bdddwwmdec2`).
+2. Importez le fichier `script.sql` pour créer la table `users` et insérer les données de test.
+
+### 2. Configuration
+Ouvrez le fichier `config/Database.php` et modifiez les propriétés privées pour correspondre à vos accès locaux :
+
+```php
+private string $host = 'localhost';
+private string $dbname = 'bdddwwmdec2'; // Votre nom de BDD
+private string $username = 'root';      // Votre utilisateur
+private string $password = '';          // Votre mot de passe
+```
+
+### 3. Lancement
+Le moyen le plus simple est d'utiliser le serveur interne de PHP. Ouvrez un terminal à la racine du projet et lancez :
+
+```bash
+php -S localhost:8000 -t publics
+```
+
+Accédez ensuite à : `http://localhost:8000`
+
+## 🧠 Concepts Clés Expliqués
+
+### Le Singleton (`Database.php`)
+Pour éviter de créer de multiples connexions à la base de données à chaque instanciation d'un modèle, nous utilisons le pattern Singleton.
+- **Constructeur privé** : Empêche le `new Database()`.
+- **Méthode statique** `get_instance()` : Retourne l'unique instance de la connexion.
+
+### Le Modèle (`User.php`)
+Il étend la logique de base de données. Il contient les méthodes SQL brutes (`SELECT`, `INSERT`, `DELETE`). Notez l'utilisation de `prepare()` et `execute()` pour prévenir les injections SQL.
+
+### Le Contrôleur (`UserController.php`)
+Il fait le lien entre le Modèle et la Vue.
+1. Il reçoit la demande du routeur.
+2. Il demande les données au Modèle (`$this->userModel->getAll()`).
+3. Il charge la Vue correspondante (`require .../views/...`).
+4. Il gère la validation des formulaires (`addUser`).
+
+### Le Routeur (`publics/index.php`)
+C'est le chef d'orchestre. Il analyse l'URL (paramètre `?action=...`) et décide quelle méthode du contrôleur appeler.
+
+## 📝 Exercices suggérés (Pour aller plus loin)
+
+1. **Update** : Le fichier SQL contient des requêtes `UPDATE`, mais la fonctionnalité n'est pas implémentée dans le code PHP. Créez la méthode `edit($id)` et `update()` dans le contrôleur et le modèle.
+2. **Namespaces** : Les fichiers contiennent des namespaces commentés (`// namespace App\Controllers;`). Décommentez-les et mettez en place un **Autoloader** (via Composer ou manuel) pour remplacer les `require_once`.
+3. **Vues** : Créez les fichiers manquants dans le dossier `views/` (`create_user.php`, `utilisateur.php`, etc.) pour rendre l'application fonctionnelle visuellement.
+
+## 🛠 Stack Technique
+
+- PHP 8.x
+- MySQL
+- HTML/CSS (pour les vues)
+
+---
+*Projet de révision DWWM.*
