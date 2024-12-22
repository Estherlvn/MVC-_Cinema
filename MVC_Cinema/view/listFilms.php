<?php ob_start(); // La VIEW commence avec "ob_start()" ?> 

<p class="uk-label uk-label-warning">LISTE DES <?= $requete->rowCount() ?> FILMS</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNÉE DE SORTIE</th>
            <th>DURÉE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= htmlspecialchars($film["id_film"]) ?>">
                    <?= htmlspecialchars($film["titre"]) ?></a></td>
                <td><?= htmlspecialchars($film["sortie"]) ?></td>
                <td><?= htmlspecialchars($film["duree"]) ?></td>
                <td>
                    <?php if (!empty($film["img_url"]) && filter_var($film["img_url"], FILTER_VALIDATE_URL)): ?>
                        <img src="<?= htmlspecialchars($film["img_url"]) ?>" alt="<?= htmlspecialchars($film["titre"]) ?>" style="max-width: 300px;">
                    <?php else: ?>
                        <span>Aucune image</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?action=addFilm" class="btnGenre">Ajouter un film</a>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
