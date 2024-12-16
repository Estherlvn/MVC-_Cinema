<?php

namespace Controller;

use Model\Connect;


class CinemaController {


    // Page d'accueil
    public function home() {
        require "view/home.php";
    }


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


    // AJOUTER un Genre
    public function addGenre() {
        if (isset($_POST['submit']) && !empty($_POST["nom_genre"])) {
            $nom_genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO genre (nom_genre) VALUES (:nom_genre)");
            $requete->execute(["nom_genre" => $nom_genre]);

            header("Location: index.php?action=listGenres"); // Recharger la liste des genres après ajout
        }

        require "view/addGenre.php";
    }

    // AJOUTER un acteur
    public function addActeur() {
        if (isset($_POST['submit']) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["sexe"]) && !empty($_POST["naissance"])) {
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $naissance = filter_input(INPUT_POST, "naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO personne (nom, prenom, sexe, naissance) VALUES (:nom, :prenom, :sexe, :naissance)");
            $requete->execute(["nom" => $nom, "prenom" => $prenom, "sexe" => $sexe, "naissance" => $naissance]);

            $id_personne = $pdo->lastInsertId(); // récupère l'ID du dernier ajout "personne" pour l'ajouter à "acteur"

            $requete = $pdo->prepare("INSERT INTO acteur (id_personne) VALUES (:id_personne)");
            $requete->execute(["id_personne" => $id_personne]);

            header("Location: index.php?action=listActeurs"); // Recharger la liste des acteurs après ajout
        }

        require "view/addActeur.php";
    }
    
    // AJOUTER un réalisateur
    public function addRealisateur() {
        if (isset($_POST['submit']) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["sexe"]) && !empty($_POST["naissance"])) {
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $naissance = filter_input(INPUT_POST, "naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO personne (nom, prenom, sexe, naissance) VALUES (:nom, :prenom, :sexe, :naissance)");
            $requete->execute(["nom" => $nom, "prenom" => $prenom, "sexe" => $sexe, "naissance" => $naissance]);

            $id_personne = $pdo->lastInsertId(); // récupère l'ID du dernier ajout "personne" pour l'ajouter à "réalisateur"

            $requete = $pdo->prepare("INSERT INTO realisateur (id_personne) VALUES (:id_personne)");
            $requete->execute(["id_personne" => $id_personne]);

            header("Location: index.php?action=listRealisateurs"); // Recharger la liste des réalisateur après ajout
        }

        require "view/addRealisateur.php";
    }

    // AJOUTER UN FILM
    public function addFilm() {
        $pdo = Connect::seConnecter();
    
        // Requête pour récupérer les réalisateurs
        $requeteReal = $pdo->query("
            SELECT id_realisateur, prenom, UPPER(nom) AS nom
            FROM realisateur
            INNER JOIN personne ON realisateur.id_personne = personne.id_personne
            ORDER BY nom
        ");
        $realisateurs = $requeteReal->fetchAll();
    
        // Requête pour récupérer les genres
        $requeteGenre = $pdo->query("
            SELECT id_genre, nom_genre
            FROM genre
            ORDER BY nom_genre
        ");
        $genres = $requeteGenre->fetchAll();
    
        // Si le formulaire est soumis et que les champs ne sont pas vides
        if (isset($_POST['submit']) && 
            !empty($_POST["titre"]) && 
            !empty($_POST["sortie"]) && 
            !empty($_POST["realisateur"]) && 
            !empty($_POST["duree"]) && 
            !empty($_POST["synopsis"]) && 
            !empty($_POST["note"]) &&
            !empty($_POST["genres"])) {
    
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sortie = filter_input(INPUT_POST, 'sortie', FILTER_SANITIZE_NUMBER_INT);
            $id_realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_NUMBER_INT);  // ID du réalisateur sélectionné
            $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $genresSelected = $_POST['genres']; // Récupérer les genres sélectionnés sous forme de tableau
    
            // Préparer et exécuter l'insertion du film dans la base de données
            $requete = $pdo->prepare("INSERT INTO film (titre, sortie, id_realisateur, duree, synopsis, note)
            VALUES (:titre, :sortie, :id_realisateur, :duree, :synopsis, :note)");
            $requete->execute([
                'titre' => $titre,
                'sortie' => $sortie,
                'id_realisateur' => $id_realisateur,
                'duree' => $duree,
                'synopsis' => $synopsis,
                'note' => $note
            ]);
    
            // Récupérer l'ID du dernier film ajouté
            $id_film = $pdo->lastInsertId();
    
            // Insertion des genres dans la table film_genre pour ce film
            $requeteGenreFilm = $pdo->prepare("INSERT INTO film_genre (id_film, id_genre) VALUES (:id_film, :id_genre)");
            
            foreach ($genresSelected as $id_genre) {
                // Insérer chaque genre sélectionné pour ce film
                $requeteGenreFilm->execute([
                    'id_film' => $id_film,
                    'id_genre' => $id_genre
                ]);
            }
    
            // Rediriger après l'ajout du film
            header("Location: index.php?action=listFilms");
            exit();
        }
    
        // Charger la vue d'ajout de film avec la liste des réalisateurs et des genres
        require "view/addFilm.php";
    }
    

    }
    ?>
    
