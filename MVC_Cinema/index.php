<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$ctrlCinema = new CinemaController();

$id = (isset($GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

    case "ListFilms" : $ctrlCinema->listFilms(); break;
    case "ListActeurs" : $ctrlCinema->ListActeurs($id); break;
}

}

