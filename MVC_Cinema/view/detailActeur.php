<?php ob_start();
?>

<h1><?= $acteur["prenom"] . ' ' . $acteur["nom"] ?></h1>
<p><strong>Date de naissance :</strong> <?= $acteur["naissance"] ?></p>

<h2>Filmographie</h2>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre du film</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($filmographie as $film) {
        ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["nom_role"] ?></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php

$titre = "Détail de l'acteur";
$titre_secondaire = $acteur["prenom"] . ' ' . $acteur["nom"];
$contenu = ob_get_clean();
require "view/template.php";

?>
