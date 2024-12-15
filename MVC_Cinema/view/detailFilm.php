<?php ob_start();
?>

<h1><?= $film["titre"] ?></h1>
<p><strong>Année de sortie :</strong> <?= $film["sortie"] ?></p>
<p><strong>Durée :</strong> <?= $film["duree"] ?> minutes</p>
<p><strong>Synopsis :</strong> <?= $film["synopsis"] ?></p>

<h2>Casting</h2>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($casting as $acteur) {
        ?>
                <tr>
                    <td><?= $acteur["prenom"] ?></td>
                    <td><?= $acteur["nom"] ?></td>
                    <td><?= $acteur["nom_role"] ?></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php

$titre = "Détail du film";
$titre_secondaire = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";
?>
