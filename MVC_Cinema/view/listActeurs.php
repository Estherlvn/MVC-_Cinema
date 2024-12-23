<?php ob_start(); // La VIEW commence avec "ob_start()" ?> 

<div class="film-page">
    <div class="film-header">
<p class="uk-label uk-label-warning">La bibliothèque contient <?= $requete->rowCount() ?> acteurs</p>
<a href="index.php?action=addActeur" class="btnGenre">Ajouter un acteur</a>
</div>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>PRENOM</th>
            <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $acteur) { ?>
            <tr>
                <td><?= htmlspecialchars($acteur["prenom"]) ?></td>
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>">
                <?= $acteur["nom"] ?></a></td>
               
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
