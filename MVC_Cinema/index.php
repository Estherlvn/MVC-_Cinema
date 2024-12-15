<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    if (file_exists($path)) {
        include $path;
    }
});

$ctrlCinema = new CinemaController();

$action = isset($_GET["action"]) ? $_GET["action"] : 'listFilms';
$id = isset($_GET["id"]) ? $_GET["id"] : null;

switch ($action) {
    case "listFilms":
        $ctrlCinema->listFilms();
        break;
    case "listActeurs":
        $ctrlCinema->listActeurs();
        break;
    case "listRealisateurs":
        $ctrlCinema->listRealisateurs();
        break;
    case "listGenres":
        $ctrlCinema->listGenres();
        break;

    case "detailFilm":
        if ($id) {
            $ctrlCinema->detailFilm($id);
        } else {
            echo "Film non spécifié.";
        }
        break;

    case "detailActeur":
        if ($id) {
            $ctrlCinema->detailActeur($id);
        } else {
            echo "Acteur non spécifié.";
        }
        break;

    case "detailRealisateur":
        if ($id) {
            $ctrlCinema->detailRealisateur($id);
        } else {
            echo "Réalisateur non spécifié.";
        }
        break;
}
?>
