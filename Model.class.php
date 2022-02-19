<?php

abstract class Model{
    private static $pdo;

    // definir une connexion entre notre programme et la bese de données
    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=biblio;charset=utf8", 'root', '');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_WARNING);  
    }

    protected function getBdd(){
        // si la connection entre le programme et la base de données n'existe pas alors crée une 
        // sinon retoune la connection existante
        if (self::$pdo === null) {
            self::setBdd();
        }

        return self::$pdo;
    }
}