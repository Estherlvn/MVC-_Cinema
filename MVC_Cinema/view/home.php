<?php ob_start(); ?>


<div id="pageAcc">

<div class="accueil">
<h1>WikiMovies</h1>
<h2>Bibliothèque collaborative de films en ligne</h2>
<button id="btnHome" onclick="location.href='index.php?action=listFilms'">Découvrir</button>
</div>

<div class="slideshow-container">
    <?php foreach($images as $image): ?>
        <div class="mySlides fade">
            <img class="poster" src="<?= htmlspecialchars($image['img_url']) ?>" style="width:100%">
        </div>
    <?php endforeach; ?>
</div>

</div>


<?php
$titre = "Page d'accueil";
$titre_secondaire = "Page d'accueil";
$contenu = ob_get_clean(); 
require "view/template.php"; 
?>
