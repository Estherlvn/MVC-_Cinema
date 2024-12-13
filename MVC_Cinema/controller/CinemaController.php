<?php

namespace Controller;

use Model\Connect;


class CinemaController {

    // Lister les films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, sortie, duree
            FROM film
            ORDER BY sortie DESC
        ");
        
        // Passez la requête à la vue
        require "view/listFilms.php";
    }

    // Lister les acteurs
    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_acteur, prenom, UPPER(nom) AS nom
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        
        // Passez la requête à la vue
        require "view/listActeurs.php";
    }

     // Lister les réalisateurs
     public function listRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_realisateur, prenom, UPPER(nom) AS nom
            FROM realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        
        // Passez la requête à la vue
        require "view/listRealisateurs.php";
    }

      // Lister les genres (films)
      public function listGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_genre, nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        
        // Passez la requête à la vue
        require "view/listGenres.php";
    }
}
?>
