<?php ob_start(); // La VIEW commence avec "ob_start()" ?>

<div class="film-page">
    <div class="film-header">
        <p class="uk-label uk-label-warning">La bibliothèque contient actuellement <?= $requete->rowCount() ?> films</p>
        <a href="index.php?action=addFilm" class="btnGenre">Ajouter un film</a>
    </div>

    <div class="film-table-container">
        <table class="uk-table uk-table-divider uk-table-hover">
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>ANNÉE DE SORTIE</th>
                    <th>DURÉE</th>
                    <th>AFFICHE</th>
                    <th>NOTE</th>

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
                                <img src="<?= htmlspecialchars($film["img_url"]) ?>" alt="<?= htmlspecialchars($film["titre"]) ?>" class="film-image">
                            <?php else: ?>
                                <span>Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars(number_format($film["note"], 1)) ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean(); // La VIEW se termine avec "ob_get_clean()"
require "view/template.php"; // Permet d'injecter le contenu dans le template "squelette" > template.php
?>
