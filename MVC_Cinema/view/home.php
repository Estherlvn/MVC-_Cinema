<?php ob_start(); ?>
    
    <h1>Bienvenue dans le projet CINEMA</h1>
    <p>Découvrez nos films, acteurs, réalisateurs et genres de films.</p>
    <p>Consultez les détails des films, des acteurs, et bien plus encore.</p>
    
    <div>
        <h2>Qu'est-ce qu'on propose ?</h2>
        <ul>
            <li>Liste des films avec affiches et détails.</li>
            <li>Acteurs et réalisateurs avec leur filmographie.</li>
            <li>Genres de films pour mieux explorer nos catalogues.</li>
        </ul>
    </div>

<?php
    $titre = "Page d'accueil";
    $titre_secondaire = "Page d'accueil";
    $contenu = ob_get_clean(); 
    require "view/template.php"; 
