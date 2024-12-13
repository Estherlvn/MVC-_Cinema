<?php

namespace Model;

// Connexion à la base de données
abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema_ledlev";
    CONST USER = "root";
    CONST PASS = "";

    public static function seConnecter() {
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        }catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}