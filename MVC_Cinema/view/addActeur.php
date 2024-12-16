<?php ob_start(); ?>

<h1>Ajouter un acteur</h1>
<form action="index.php?action=addActeur" method="post">
    <div class="uk-margin">
        <label class="uk-form-label">Nom de l'acteur:</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name="nom" required>
            <input class="uk-input" type="text" name="prenom" required>
            <input class="uk-input" type="text" name="sexe" required>
            <input class="uk-input" type="text" name="naissance" required>
        </div>
    </div>
    <button class="uk-button uk-button-primary" type="submit" name="submit">Ajouter</button>
</form>

<?php
$contenu = ob_get_clean();
require "view/template.php";
?>
