<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f9f9f9; }
    </style>
</head>
<body> -->
    <?php
    
    require __DIR__ .'/../parts/header.php';
    
    ?>
    <h1>Liste des utilisateurs</h1>

    <!-- Lien vers la création d'un utilisateur (optionnel si formulaire prévu) -->
    <p><a href="/?action=create">Ajouter un utilisateur</a></p>

    <!-- Vérifie que la variable $users est bien un tableau non vide -->
    <?php if (!empty($users)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Détails</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle sur les utilisateurs -->
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['nom']) ?></td>
                        <td><?= htmlspecialchars($user['prenom']) ?></td>
                        <td>
                           <a href="/?action=show&id=<?= $user['id'] ?>">Voir</a>
                        </td>
                        <td>
                            <a href="/?action=delete&id=<?= $user['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Message si aucun utilisateur n'est trouvé -->
        <p>Aucun utilisateur trouvé dans la base de données.</p>
    <?php endif; ?>

</body>
</html>
