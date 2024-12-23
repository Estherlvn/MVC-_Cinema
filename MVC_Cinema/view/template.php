<!-- view/template.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/css/uikit.min.css" /> -->
    <link rel="stylesheet" href="public/css/styleHome.css" />
    <link rel="stylesheet" href="public/css/styleFilms.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
<?php include 'navbar.php'; // Inclure la barre de navigation ?>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
                <?= $contenu ?>
        </main>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit-icons.min.js"></script> -->
    <script src="public/js/slider.js"></script>
</body>
</html>
