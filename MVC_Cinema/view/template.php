<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= htmlspecialchars($titre) ?></title>
</head>
<body>
    <div id="wrapper" class="uk-container uk-container-expand">

        <nav>
            <ul>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
                <li><a href="index.php?action=listGenres">Genres</a></li>
                <!-- <li><a href=""></a></li> -->
            </ul>        
        </nav>
        <main>
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>
