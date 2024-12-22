<?php ob_start();
?>

<h1><?= htmlspecialchars($film["titre"]) ?></h1>
<p><strong>Année de sortie :</strong> <?= htmlspecialchars($film["sortie"]) ?></p>
<p><strong>Durée :</strong> <?= htmlspecialchars($film["duree"]) ?> minutes</p>
<!-- <p><strong>Synopsis :</strong> <?= htmlspecialchars($film["synopsis"]) ?></p> -->
<p><strong>Synopsis :</strong> <?= html_entity_decode($film["synopsis"]) ?></p>

<?php if (!empty($film["img_url"]) && filter_var($film["img_url"], FILTER_VALIDATE_URL)): ?>
    <img src="<?= htmlspecialchars($film["img_url"]) ?>" alt="<?= htmlspecialchars($film["titre"]) ?>" style="max-width: 300px;">
<?php else: ?>
    <p>Aucune image disponible</p>
<?php endif; ?>

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
        <?php foreach($casting as $acteur): ?>
            <tr>
                <td><?= htmlspecialchars($acteur["prenom"]) ?></td>
                <td><?= htmlspecialchars($acteur["nom"]) ?></td>
                <td><?= htmlspecialchars($acteur["nom_role"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$titre = "Détail du film";
$titre_secondaire = htmlspecialchars($film["titre"]);
$contenu = ob_get_clean();
require "view/template.php";
?>
