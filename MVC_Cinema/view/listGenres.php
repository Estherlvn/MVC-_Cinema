<?php ob_start(); // La VIEW commence avec "ob_start()" ?> 

<div class="film-page">
    <div class="film-header">
<p class="uk-label uk-label-warning">La bibliothèque contient <?= $requete->rowCount() ?> genres</p>
<a href="index.php?action=addGenre" class="btnGenre">Ajouter un genre</a>
</div>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM DES GENRES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $genre) { ?>
            <tr>
                <td><?= htmlspecialchars($genre["nom_genre"]) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>


<?php
$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
