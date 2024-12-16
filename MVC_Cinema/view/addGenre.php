<?php ob_start(); ?>

<h1>Ajouter un genre</h1>
<form action="index.php?action=addGenre" method="post">
    <div class="uk-margin">
        <label class="uk-form-label">Nom du genre:</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name="nom_genre" required>
        </div>
    </div>
    <button class="uk-button uk-button-primary" type="submit" name="submit">Ajouter</button>
</form>

<?php
$contenu = ob_get_clean();
require "view/template.php";
?>
