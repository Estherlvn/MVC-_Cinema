<?php

namespace Controller;

use Model\Connect;

class CinemaController {

    // Lister les films
    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, sortie
            FROM film
        ");
        
        // Passez la requête à la vue
        require "view/listFilms.php";
    }
}
?>
