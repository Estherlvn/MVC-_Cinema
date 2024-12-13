<?php ob_start(); // La VIEW  commence avec "ob_start()"
?> 

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films </p>

<table class="uk-table uk-table-stripped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetachAll() as $film) { ?>
                <tr>
                    <td><?= $film["titre"] ?></td>
                    <td><?= $film["annee_sortie"] ?></td>
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean(); // La VIEW  se termine avec "ob_get_clean()" //  contenu stocké dans la variable $contenu
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>

<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">
                <h1 class="uk-heading-divier">PDO Cinema</h1>
                <h2 class="uk-headinf-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
    
</body>
</html>



