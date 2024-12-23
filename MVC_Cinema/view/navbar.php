<nav class="uk-navbar-container uk-navbar uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">

        <!-- Logo cliquable menant à la page d'accueil -->
        <a href="index.php?action=home" class="uk-navbar-item uk-logo">
            <img src="public/img/LOGO_nav.png" alt="Logo" style="max-height: 50px;"> 
        </a>
        
        <!-- Formulaire de recherche -->
        <form action="index.php?action=searchFilms" method="get" class="searchBar uk-search uk-search-navbar">
            <input class="uk-search-input" type="search" name="query" placeholder="Rechercher un film..." style="max-height: 40px;">
            <button type="submit" class="uk-search-icon-flip" uk-search-icon></button>
        </form>

        <!-- Liens de navigation -->
        <ul class="uk-navbar-nav">
            <li><a href="index.php?action=home">Accueil</a></li>
            <li><a href="index.php?action=listFilms">Films</a></li>
            <li><a href="index.php?action=listActeurs">Acteurs</a></li>
            <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
            <li><a href="index.php?action=listGenres">Genres</a></li>
        </ul>
    </div>

    <div class="uk-navbar-right">
        <!-- Éléments situés à droite de la navbar -->

        <a href="index.php?action=home" class="iconeFav">
            <img src="public/img/fav.png" alt="Favoris" style="max-height: 40px;"> 
        </a>
        <a href="index.php?action=home" class="iconeLog">
            <img src="public/img/log.png" alt="Connexion" style="max-height: 40px;"> 
        </a>
    </div>
</nav>
