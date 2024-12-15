<!-- view/template.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/css/uikit.min.css" />
    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <?php include 'navbar.php'; // Inclure la barre de navigation ?>
        <main>
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit-icons.min.js"></script>
</body>
</html>
