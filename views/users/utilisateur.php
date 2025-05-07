<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de l'utilisateur</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
    </style>
</head>
<body> -->
    <?php
    
    require __DIR__ .'/../parts/header.php';
    
    ?>
    <h1>Détails de l'utilisateur</h1>

    <?php if (!empty($user)): ?>
        <ul>
            <li><strong>ID :</strong> <?= htmlspecialchars($user['id']) ?></li>
            <li><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></li>
            <li><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></li>
            <li><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></li>
            <li><strong>Âge :</strong> <?= htmlspecialchars($user['age']) ?></li>
            <?php if (!empty($user['biographie'])): ?>
                <li><strong>Biographie :</strong> <?= nl2br(htmlspecialchars($user['biographie'])) ?></li>
            <?php endif; ?>
        </ul>
    <?php else: ?>
        <p>Utilisateur introuvable.</p>
    <?php endif; ?>

    <p><a href="/?action=index">← Retour à la liste</a></p>

</body>
</html>
