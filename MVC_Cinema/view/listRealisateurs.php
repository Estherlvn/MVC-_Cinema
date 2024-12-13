<?php ob_start(); // La VIEW commence avec "ob_start()" ?> 

<p class="uk-label uk-label-warning">LISTE DES <?= $requete->rowCount() ?> REALISATEURS</p>

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
                <td><?= htmlspecialchars($realisateur["nom"]) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
