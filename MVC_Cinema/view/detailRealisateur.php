<?php ob_start();
?>

<h1><?= $realisateur["prenom"] . ' ' . $realisateur["nom"] ?></h1>
<p><strong>Date de naissance :</strong> <?= $realisateur["naissance"] ?></p>

<h2>Films réalisés</h2>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre du film</th>
            <th>Date de sortie</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($films as $film) {
        ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["sortie"] ?></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php

$titre = "Détail du réalisateur";
$titre_secondaire = $realisateur["prenom"] . ' ' . $realisateur["nom"];
$contenu = ob_get_clean();
require "view/template.php";
?>
