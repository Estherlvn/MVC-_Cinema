<?php ob_start(); // La VIEW commence avec "ob_start()" ?> 

<p class="uk-label uk-label-warning">LISTE DES <?= $requete->rowCount() ?> ACTEURS</p>

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

<a href="index.php?action=addActeur" class="btnGenre">Ajouter un acteur</a>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
