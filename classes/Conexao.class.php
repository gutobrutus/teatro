<?php
require_once 'Config.php';

require_once 'Funcoes.class.php';

abstract class Conexao extends Funcoes {

    private static $instance;

    private static function conectar() {
        try {
            if (self::$instance == null) :
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $opcoes);
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
