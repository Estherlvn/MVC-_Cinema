<?php ob_start(); ?>

<h1>Ajouter un réalisateur</h1>
<form action="index.php?action=addRealisateur" method="post">
    <div class="uk-margin">
        <label class="uk-form-label">Nom:</label>
        <input class="uk-input" type="text" name="nom" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Prénom:</label>
        <input class="uk-input" type="text" name="prenom" required>
    </div>

    <div class="uk-margin">
    <label class="uk-form-label">Sexe:</label>
    <div class="uk-form-controls">
        <label>
            <input class="uk-radio" type="radio" name="sexe" value="H" required> Homme
        </label>
        <label>
            <input class="uk-radio" type="radio" name="sexe" value="F" required> Femme
        </label>
    </div>
</div>

    <div class="uk-margin">
        <label class="uk-form-label">Année de naissance:</label>
        <input class="uk-input" type="number" name="naissance" required>
    </div>
    <button class="uk-button uk-button-primary" type="submit" name="submit">Ajouter</button>
</form>

<?php
$contenu = ob_get_clean();
require "view/template.php";
?>
