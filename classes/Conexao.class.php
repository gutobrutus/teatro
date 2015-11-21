<?php
require_once 'Config.php';

abstract class Conexao {

    private static $instance;

    private static function conectar() {
        try {
            if (self::$instance == null) :
                self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e -> getMessage();
        }
        return self::$instance;
    }

    protected static function getDB() {
        return self::conectar();
    }

}
