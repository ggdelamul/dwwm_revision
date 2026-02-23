# Projet de Révision POO & MVC - DWWM

Ce projet est une application web simple développée en PHP natif (sans framework) pour réviser les concepts fondamentaux de la Programmation Orientée Objet (POO) et l'architecture MVC (Modèle-Vue-Contrôleur).

## 🎯 Objectifs

- Comprendre l'architecture **MVC**.
- Mettre en œuvre le pattern **Singleton** pour la connexion à la base de données.
- Utiliser **PDO** pour les interactions SQL sécurisées.
- Créer un système de **Routage** basique.
- Manipuler des **Traits** (Logger).

## 📂 Structure du Projet

- `config/` : Configuration (Connexion BDD Singleton).
- `controllers/` : Logique métier (UserController).
- `models/` : Accès aux données (User).
- `publics/` : Point d'entrée (index.php) et routeur.
- `views/` : Templates HTML.
- `Trait/` : Traits utilitaires (Log).
- `script.sql` : Script de création de la base de données.

## 🚀 Installation

### 1. Base de données
1. Créez une base de données MySQL (par défaut `bdddwwmdec2` dans la config).
2. Importez le fichier `script.sql` pour créer la table `users` et insérer les données de test.

### 2. Configuration
Vérifiez et modifiez si nécessaire les identifiants de connexion dans `config/Database.php` :
```php
private string $host = 'localhost';
private string $dbname = 'bdddwwmdec2';
private string $username = 'root';
private string $password = '';
```

### 3. Lancement
Ouvrez un terminal à la racine du projet et lancez le serveur interne de PHP en pointant vers le dossier `publics` :

```bash
php -S localhost:8000 -t publics
```

Accédez ensuite à l'application via : http://localhost:8000

## 🛠 Fonctionnalités

- **Lister les utilisateurs** : Page d'accueil (`?action=index`).
- **Voir un utilisateur** : Détails d'un profil (`?action=show&id=X`).
- **Ajouter un utilisateur** : Formulaire de création (`?action=create`).
- **Supprimer un utilisateur** : Action de suppression (`?action=delete&id=X`).

## 🧪 Tests
Un fichier `test.php` est disponible à la racine pour tester les classes (Modèles, Connexion) indépendamment du routeur et des vues.

```bash
php test.php
```

---
*Projet réalisé dans le cadre de la formation DWWM.*

