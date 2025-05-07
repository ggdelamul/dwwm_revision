<?php 
require __DIR__ . '/../parts/header.php';
?>
<h1>Ajouter un nouvel utilisateur</h1>

    <form method="post" action="/?action=add">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="age">Âge :</label>
        <input type="number" name="age" id="age" min="0" required>

        <label for="biographie">Biographie :</label>
        <textarea name="biographie" id="biographie" rows="5"></textarea>

        <button type="submit">Enregistrer</button>
    </form>

    <a href="/?action=index">← Retour à la liste</a>

</body>
</html>