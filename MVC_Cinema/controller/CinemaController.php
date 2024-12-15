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


     // Détails d'un film et casting
     public function detailFilm($id) {
        $pdo = Connect::seConnecter();

        // Récupérer les détails du film
        $filmRequete = $pdo->prepare("
            SELECT id_film, titre, sortie, duree, synopsis
            FROM film
            WHERE id_film = :id
        ");
        $filmRequete->execute(["id" => $id]);
        $film = $filmRequete->fetch();

        // Récupérer le casting du film
        $castingRequete = $pdo->prepare("
            SELECT p.nom, p.prenom, r.nom_role
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            INNER JOIN casting c ON a.id_acteur = c.id_acteur
            INNER JOIN role r ON c.id_role = r.id_role
            WHERE c.id_film = :id
        ");
        $castingRequete->execute(["id" => $id]);
        $casting = $castingRequete->fetchAll();

        // Passez les résultats à la vue
        require "view/detailFilm.php";
    }


    // Détails d'un acteur et filmographie
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();

        // Récupérer les détails de l'acteur
        $acteurRequete = $pdo->prepare("
            SELECT p.prenom, UPPER(p.nom) AS nom, p.naissance
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
            WHERE a.id_acteur = :id
        ");
        $acteurRequete->execute(["id" => $id]);
        $acteur = $acteurRequete->fetch();

        // Récupérer la filmographie de l'acteur
        $filmographieRequete = $pdo->prepare("
            SELECT f.titre, r.nom_role
            FROM film f
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN role r ON c.id_role = r.id_role
            WHERE c.id_acteur = :id
        ");
        $filmographieRequete->execute(["id" => $id]);
        $filmographie = $filmographieRequete->fetchAll();

        // Passez les résultats à la vue
        require "view/detailActeur.php";
    }



     // Détails d'un réalisateur et ses films
     public function detailRealisateur($id) {
        $pdo = Connect::seConnecter();

        // Récupérer les détails du réalisateur
        $realisateurRequete = $pdo->prepare("
            SELECT p.prenom, UPPER(p.nom) AS nom, p.naissance
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE r.id_realisateur = :id
        ");
        $realisateurRequete->execute(["id" => $id]);
        $realisateur = $realisateurRequete->fetch();

        // Récupérer les films du réalisateur
        $filmsRequete = $pdo->prepare("
            SELECT f.id_film, f.titre, f.sortie
            FROM film f
            WHERE f.id_realisateur = :id
        ");
        $filmsRequete->execute(["id" => $id]);
        $films = $filmsRequete->fetchAll();

        // Passez les résultats à la vue
        require "view/detailRealisateur.php";
    }

}
?>
