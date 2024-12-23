<?php ob_start(); ?> 

<div class="film-page">
    <div class="film-header">
<p class="uk-label uk-label-warning">La bibliothèque contient <?= $requete->rowCount() ?> réalisateurs</p>
<a href="index.php?action=addRealisateur" class="btnGenre">Ajouter un réalisateur</a>
</div>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>PRENOM</th>
            <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $realisateur) { ?>
            <tr>
                <td><?= htmlspecialchars($realisateur["prenom"]) ?></td>
                <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"] ?>">
                <?= $realisateur["nom"] ?></a></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>


<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean(); 
require "view/template.php"; 
