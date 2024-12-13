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

switch ($action) {
    case "listFilms":
        $ctrlCinema->listFilms();
        break;

    // case "detailFilm":
    //     $ctrlCinema->detailFilm($id);
    //     break;

    // case "listActeurs":
    //     $ctrlCinema->listActeurs($id);
    //     break;
}
?>
