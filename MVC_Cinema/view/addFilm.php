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
            <option value="" disabled selected>Choisir un réalisateur</option>
            <?php foreach ($realisateurs as $realisateur): ?>
                <option value="<?= $realisateur['id_realisateur'] ?>">
                    <?= htmlspecialchars($realisateur['prenom']) . ' ' . htmlspecialchars($realisateur['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Durée:</label>
        <input class="uk-input" type="number" name="duree" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Synopsis:</label>
        <input class="uk-input" type="text" name="synopsis" required>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label">Note:</label>
        <input class="uk-input" type="number" name="note" required>
    </div>
    <button class="uk-button uk-button-primary" type="submit" name="submit">Ajouter</button>
</form>

<?php
$contenu = ob_get_clean();
require "view/template.php";
?>
