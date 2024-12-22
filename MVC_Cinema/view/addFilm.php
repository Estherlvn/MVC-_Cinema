<?php ob_start(); ?>

<h1>Ajouter un film</h1>
<form action="index.php?action=addFilm" method="post">
    <div class="uk-margin">
        <label class="uk-form-label">Titre du film:</label>
        <input class="uk-input" type="text" name="titre" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Année de sortie:</label>
        <input class="uk-input" type="text" name="sortie" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Réalisateur:</label>
        <select class="uk-select" name="realisateur" required>
            <?php foreach ($realisateurs as $realisateur): ?>
                <option value="<?= $realisateur['id_realisateur'] ?>">
                    <?= $realisateur['prenom'] . ' ' . $realisateur['nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Durée:</label>
        <input class="uk-input" type="number" min="0" max="800" name="duree" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Synopsis:<br></label>
        <textarea class="uk-textarea" name="synopsis" rows="5" required></textarea>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Note:</label>
        <input class="uk-input" type="number" step="0.1" min="0" max="5" name="note" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Genres:<br></label>
        <?php foreach ($genres as $genre): ?>
            <label class="uk-checkbox">
                <input type="checkbox" name="genres[]" value="<?= $genre['id_genre'] ?>"> <?= $genre['nom_genre'] ?>
            </label><br>
        <?php endforeach; ?>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">URL de l'image:</label>
        <input class="uk-input" type="url" name="img_url" required>
    </div>

    <button class="uk-button uk-button-primary" type="submit" name="submit">Ajouter</button>
</form>

<?php
$contenu = ob_get_clean();
require "view/template.php";
?>
